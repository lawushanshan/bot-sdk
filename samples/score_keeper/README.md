# 比赛计分技能使用说明

---
## 技能描述
技能名称 | 比赛计分
---|---
开发语言 | PHP 5.4
开发平台 | linux 
功能描述 | 帮助记分员记分，支持负分（可用于比赛，游戏等）
项目来源 | 百度度秘事业部


---
## 文件说明
Bot.php  技能的实现文件，其中包括各个意图及对每个意图的处理</br>
RedisHelper.php  这是redis操作的工具库，封装了一些Bot要用的接口</br>
server.config  redis 服务器的ip, port 配置文件</br>
start.sh 启动脚本 （启动前需要先修改里面的端口为未占用的端口）

part文件夹下的一系列php文件用于构造相应意图的请求参数，在score_keeper目录下利用命令可完成bot的意图测试

```
post-part.sh part/launch.php  # 测试启动意图
post-part.sh part/add_player.php # 测试添加选手的意图
...
```

part中的template.json为向bot请求时的请求体示例，利用postman测试该demo是否成功运行：将template.json中内容作为post的参数，请求地址是bot启动成功后的http://ip:port。

---
## redis存储格式说明
redis 数据存储使用hset,存储格式如下</br>
key field1 value1 field2 value2 </br>
对应成json则类似如下形式

```

{
key1:{
           field1 : value,
           field2 : value,
         },
    key2:{
            field1 : value,
            field2 : value,
         }
    }
    ```
在该计分器中，key为data_userid,  如：data_123456,  field为记分员用户添加的选手，value则为对应选手的分数

```
{
    data_123456:{
                    张三 : 20,
                    李四 : 3,
                },
    data_111111:{
                    王五 : 45,
                    赵六 : 0,
                }
    }
```

---
## 使用示例

操作 | 示例
---|---
增加选手 | 添加选手张三
删除选手| 删除选手张三
查询选手| 现在有哪些选手
给选手加分|选手张三加10分
给选手扣分|选手李四扣3分
查询选手分数|选手张三多少分
查询比分| 场上比分
比赛重置（选手分数都清零）| 比赛重置
开始新游戏（删除记分员及其下记分数据）| 开始新游戏
退出计分器（删除记分员及其下记分数据） | 退出计分器
退出（保留用户记分数据）| 退出

---
## 交互示例
我： “ 打开比赛计分 ”</br>
bot: “ 计分器已打开，现在你可以为你的比赛增加参赛选手了,你可以说增加选手张三 ”</br>
我： “ 增加选手张三 ” </br>
bot: “ 已添加选手张三,你可以继续添加选手或者给已有选手增加分数 ”</br>
我： “ 给张三加10分 ” </br>
bot: “ 已给选手张三增加10分，选手当前得分：10分 ”</br>
我： “ 增加选手李四 ” </br>
bot: “ 已添加选手李四,你可以继续添加选手或者给已有选手增加分数 ”</br>
我： “ 给李四加5分 ”</br>
bot: “ 已给选手李四增加5分，选手当前得分：5分” </br>
我： “ 现在有哪些选手 ”</br>
bot: “ 当前场上共有2个参赛选手，他们分别是： 张三 ; 李四 ;” </br>
我： “ 场上比分 ”</br>
bot: “ 张三： 10分 ; 李四 ： 5分” </br>
...