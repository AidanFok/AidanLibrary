# AidanLibrary
我的图书馆管理系统是基于web的,采用了图形界面,前端使用了bootstrap框架,后端使用了php语言,环境采用了WampServer。实现了实验要求的所有功能,并对其中的一些功能进行了加强。 

当用户打开图书馆管理系统之后,首先看到的是主页。在主页上有一个几个链接，链接到管理员登录界面，用户登录界面，查询书籍界面，和联系作者界面，后面两个功能因为不需要验证特定用户的身份，因此任何人都可以使用。
在主页上可以进入管理员登录界面,输入用户名和密码，登录成功会进入管理员操作界面。所有跟管理员相关的功能都放在这个页面里面。管理员可以完成的功能分成两个模块,分别是图书入库和借书证管理。图书入库模块支持单本入库和批量入库两种方式，输入的变量为书号, 类别, 书名, 出版社, 年份, 作者, 价格, 数量。借书证管理模块可以完成增加借书证和删除借书证两种操作，同时有一个表显示所有用户的ID，姓名和类型，以便增加和删除用户操作。
同样的，进入用户登录界面,输入用户名和密码，登录成功会进入用户操作界面。在这里有一个表显示该用户所借的所有书籍，然后有两个操作，分别是借书和还书。借书输入书号时，如果该书还有库存，则借书成功，同时库存数减一；否则输出该书无库存，且输出最近归还的时间。还书时输入书号，如果该书在已借书籍列表内, 则还书成功, 同时库存加一，否则输出出错信息。
这里有一个身份验证的功能，如果不经过登录直接进入管理界面，会显示错误并返回，同时，在登录之后可以选择注销，这样可以保护系统安全。
在查找书籍界面，可以对书的 类别, 书名, 出版社, 年份(年份区间), 作者, 价格(区间)进行查询. 每条图书信息包括以下内容:书号, 类别, 书名, 出版社, 年份, 作者, 价格, 总藏书量, 库存；并且可以按用户指定属性对图书信息进行排序。
在联系作者界面是附加功能，主要是游客对这个系统的任何评论或者改进介意可以输入在这里，这会以邮件形式发给作者信箱。
