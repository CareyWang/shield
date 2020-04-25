# S.H.I.E.L.D 项目指南

------

采用 [lavary/crunz](https://github.com/lavary/crunz) 库实现。


## Usages
```php
$schedule->run('cp project project-bk')
         ->minute(['1-30', 45, 55])
         ->hour('1-5', 7, 8)
         ->dayOfMonth(12, 15)
         ->month(1)
         ->appendOutputTo('/var/log/backup.log')
         ->description('Create a backup of the project directory.');    
 
$schedule->run('cp project project-bk')
      ->everyFiveMinutes()
      ->between('00:00 2018-10-01', '23:59 2018-10-15')
      ->appendOutputTo('/var/log/backup.log')
      ->description('Create a backup of the project directory.');        
```

---

+ hourly()
+ daily()
+ weekly() 
+ monthly()
+ quarterly()
+ yearly() 

---

+ everyFiveMinutes()
+ everyMinute()
+ everyTwelveHours()
+ everyMonth()
+ everySixMonths()
+ everyFifteenDays()
+ everyFiveHundredThirtySevenMinutes()
+ everyThreeThousandAndFiveHundredFiftyNineMinutes()

---

+ at('13:30')
+ dailyAt('13:30')
+ minute(['1-30', 45, 55])
+ minute('30')
+ hour('1-5', 7, 8)
+ hour('13')
+ dayOfMonth(12, 15)
+ month([1, 2])
+ month(1)

---

## /etc/crontab配置：
/etc/crontab 中只需要配置一行

```bash
* * * * * root /var/www/http/shield/vendor/bin/crunz schedule:run /var/www/http/shield/tasks >> /var/log/shield/crunz.root.$(date +\%Y\%m\%d).log 2>&1
```

> * 其中，参数 **/var/www/http/shield/tasks** 就是指定 tasks 所在目录，不指定的情况下默认为 tasks。

---

## 注意：
- tasks 目录下文件必须以 Tasks 结尾，除非按照官方文档描述修改默认配置
- tasks 目录为默认 tasks 执行目录，除非按照官方文档描述修改默认配置
- cronjob 命令最后必须有输出重定向，方便查日志
