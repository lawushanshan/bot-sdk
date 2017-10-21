<?php
/**
 * Copyright (c) 2017 Baidu, Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * @desc Play类的测试类
 */
require '../vendor/autoload.php';
use PHPUnit\Framework\TestCase;

class PlayTest extends PHPUnit_Framework_TestCase{
	
	/**
     * @before
     */
    public function setupSomeFixtures()
    {
        $this->play = new Baidu\Duer\Botsdk\Directive\AudioPlayer\Play('www.baidu.com');
    }	

	/**
     * @desc 测试setToken方法
     */
	function testSetToken(){
		$this->play->setToken('token');
		$this->assertEquals($this->play->getToken(), 'token');
	}

	/**
	 * @desc 测试getToken方法
	 */
	function testGetToken(){
		$this->play->setToken('token');
		$this->assertEquals($this->play->getToken(), 'token');
	}

	/**
     * @desc 测试setUrl方法
     */
	function testSetUrl(){
		$this->play->setUrl('www.test.com');
		$url = $this->play->getData()['audioItem']['stream']['url'];
		$this->assertEquals($url, 'www.test.com');
	}

	/**
     * @desc 测试setOffsetInMilliSeconds方法
     */
	function testSetOffsetInMilliSeconds(){
		$this->play->setOffsetInMilliSeconds(1000);
		$offset = $this->play->getData()['audioItem']['stream']['offsetInMilliSeconds'];
		$this->assertEquals($offset, 1000);
	}

	/**
     * @desc 测试setProgressReportIntervalMs方法
     */
	function testSetProgressReportIntervalMs(){
		$this->play->setProgressReportIntervalMs(3000);
		$intervalMs = $this->play->getData()['audioItem']['stream']['progressReportIntervalMs'];
		$this->assertEquals($intervalMs, 3000);
	}

}