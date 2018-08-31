/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2018-08-31 18:08:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(20) COLLATE utf8_unicode_ci DEFAULT 'Marki' COMMENT '发表者',
  `keywords` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'seo keywords',
  `source` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '转载文章的来源',
  `content` longtext COLLATE utf8_unicode_ci COMMENT '内容',
  `title` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '标题',
  `thumb` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '缩略图',
  `excerpt` text COLLATE utf8_unicode_ci COMMENT '摘要',
  `publish_status` tinyint(1) DEFAULT '1' COMMENT '状态，1发布，0未发布',
  `istop` tinyint(1) NOT NULL DEFAULT '0' COMMENT '置顶 1置顶； 0不置顶',
  `recommended` tinyint(1) NOT NULL DEFAULT '0' COMMENT '推荐 1推荐 0不推荐',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='文章表';

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('34', 'Marki', 'bc-white', 'Marki', 'bc-white', 'pagea', null, 'bc-white', '1', '0', '0', '2018-08-31 09:02:02', '2018-08-31 09:02:02', null);
INSERT INTO `article` VALUES ('30', 'Marki', 'var,let,const', '简书', '我们先来絮叨絮叨 var 方式定义变量有啥 bug ？\r\nJs没有块级作用域\r\n请看这样一条规则：在JS函数中的var声明，其作用域是函数体的全部。\r\n    for(var i=0;i<10;i++){\r\n          var a = \'a\';\r\n    }\r\n\r\n    console.log(a);\r\n明明已经跳出 for 循环了，却还可以访问到 for 循环内定义的变量 a ，甚至连 i 都可以被放访问到，尴尬~\r\n\r\n2.** 循环内变量过度共享 **\r\n你可以猜一下当执行以下这段代码时会发生什么\r\nfor (var i = 0; i < 3; i++) {\r\n      setTimeout(function () {\r\n        console.log(i)\r\n      }, 1000);\r\n }\r\n在浏览器里运行一下，看看和你预想的结果是否相同？\r\n没错，控制台输出了3个3，而不是预想的 0、1、2。\r\n\r\n事实上，这个问题的答案是，循环本身及三次 timeout 回调均共享唯一的变量 ** i 。当循环结束执行时，i 的值为3。所以当第一个 timeout 执行时，调用的 i 当让也为 3 了。\r\n\r\n话说到这儿，想必客官已经猜到 let 是干嘛用的。\r\n你没猜错，就是解决这两个bug的。你尽可以把上述的两个例子中的 var 替代成 let 再运行一次。\r\n注意：必须声明 \'use strict\' 后才能使用let声明变量，否则浏览并不能显示结果\r\n\r\nlet是更完美的var\r\nlet声明的变量拥有块级作用域。 也就是说用let声明的变量的作用域只是外层块，而不是整个外层函数。let 声明仍然保留了提升特性，但不会盲目提升，在示例一中，通过将var替换为let可以快速修复问题，如果你处处使用let进行声明，就不会遇到类似的bug。\r\n\r\nlet声明的全局变量不是全局对象的属性。这就意味着，你不可以通过window.变量名的方式访问这些变量。它们只存在于一个不可见的块的作用域中，这个块理论上是Web页面中运行的所有JS代码的外层块。\r\n\r\n形如for (let x...)的循环在每次迭代时都为x创建新的绑定。\r\n这是一个非常微妙的区别，拿示例二来说，如果一个for (let...)循环执行多次并且循环保持了一个闭包，那么每个闭包将捕捉一个循环变量的不同值作为副本，而不是所有闭包都捕捉循环变量的同一个值。\r\n所以示例二中，也以通过将var替换为let修复bug。\r\n这种情况适用于现有的三种循环方式：for-of、for-in、以及传统的用分号分隔的类C循环。\r\n\r\n用let重定义变量会抛出一个语法错误（SyntaxError）。\r\n这个很好理解，用代码说话\r\n\r\nlet a = \'a\';\r\nlet a = \'b\';\r\n上述写法是不允许的，浏览器会报错，因为重复定义了。\r\n\r\n** 在这些不同之外，let和var几乎很相似了。举个例子，它们都支持使用逗号分隔声明多重变量，它们也都支持解构特性。 **\r\n\r\nconst\r\nES6引入的第三个声明类关键词：const\r\n\r\n一句话说明白，const 就是用来定义常量的！任何脑洞(fei)大(zhu)开(liu)的写法都是非法的\r\n比如这样：\r\n\r\n//只声明变量不赋值\r\nconst a\r\n这样：\r\n\r\n//重复声明变量\r\nconst a = \'a\';\r\nconst a = \'b\';\r\n还有这样：\r\n\r\n//给变量重新赋值\r\nconst a = \'a\';\r\na = \'b\'\r\n再来个黑科技：\r\n\r\n//不过不推荐这么干，实在没啥意思，常量常量，不变的才叫常量嘛~\r\nconst a = {a:\'a\'};\r\n//重新赋值当然是行不通的了\r\na = {a:\'b\'};\r\n//嘿嘿嘿科技\r\na.a = \'b\'\r\nconst 确实没啥说的，普通用户使用完全没问题，高(dou)端(bi)用户咋用都是问题。\r\n以上就是作者对 var、let、const 用法的一些总结，有不当之处，还请大大们指出。\r\n\r\n作者：麻辣小隔壁\r\n链接：https://www.jianshu.com/p/4e9cd99ecbf5\r\n來源：简书\r\n简书著作权归作者所有，任何形式的转载都请联系作者获得授权并注明出处。', 'var、let、const 区别？', '20180831/9LcCS6RSrG76KQBnUAYfj6INYKNJhBY3EJ3BvD4h.jpeg', '随着ES6规范的到来，Js中定义变量的方法已经由单一的 var 方式发展到了 var、let、const 三种之多。var 众所周知，可那俩新来的货到底有啥新特性呢？到底该啥时候用呢？', '1', '0', '1', '2018-08-31 03:42:21', '2018-08-31 03:47:06', null);

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('laungkahung@gmail.com', '$2y$10$jKLhzINShRhXqQIhwv71quNbdS1Yc3irrhyj3UeS8IwoqG8vsMqwS', '2018-08-24 03:55:22');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Marki', 'laungkahung@gmail.com', '$2y$10$s.X1Yltkey8ugIUz9GL3f.8nLlXXFCRCp.vSRoazn6zL37Hz6y6Ge', 'XlbpHKQCcVmVgpgVUy3mBladY78bTkqFnOTLVbIRQ3eYklLeNRK7u5SL1scc', '2018-08-23 10:52:13', '2018-08-23 10:52:13');
