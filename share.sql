/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50534
Source Host           : localhost:3306
Source Database       : share

Target Server Type    : MYSQL
Target Server Version : 50534
File Encoding         : 65001

Date: 2013-12-05 08:24:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `administrator`
-- ----------------------------
DROP TABLE IF EXISTS `administrator`;
CREATE TABLE `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` varchar(32) NOT NULL,
  `realname` varchar(24) NOT NULL,
  `email` varchar(24) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of administrator
-- ----------------------------
INSERT INTO `administrator` VALUES ('1', 'minishine', '4804083ece0b307329d6f62be1855b06', '徐欢欢', 'xhuan@hgdonline.net', '13307139608', '2013-11-20 15:05:03');
INSERT INTO `administrator` VALUES ('2', '熊超', '748e863d25bcf11e75ad80dd793680a9', '熊超', 'xiongchao@qq.com', '12333333333', '2013-11-24 10:31:46');

-- ----------------------------
-- Table structure for `announcement`
-- ----------------------------
DROP TABLE IF EXISTS `announcement`;
CREATE TABLE `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(100) NOT NULL,
  `publisher` varchar(10) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of announcement
-- ----------------------------
INSERT INTO `announcement` VALUES ('1', '湖工大爱分享网成立喽，欢迎大家分享各类资源！', 'minishine', '2013-11-23 22:54:30');

-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(50) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `author` varchar(10) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('14', '这是这个味呀呀呀', '5', 'xuhuan101', '2013-11-23 10:47:34');
INSERT INTO `comment` VALUES ('15', '这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀', '5', 'xuhuan101', '2013-11-23 10:47:50');
INSERT INTO `comment` VALUES ('16', '这是这个味呀呀呀这是这个味呀呀呀这是这个', '5', 'xuhuan101', '2013-11-23 10:47:55');
INSERT INTO `comment` VALUES ('17', '这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀', '5', 'xuhuan101', '2013-11-23 10:47:59');
INSERT INTO `comment` VALUES ('18', '这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀', '5', 'xuhuan101', '2013-11-23 10:48:05');
INSERT INTO `comment` VALUES ('19', '这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀', '5', 'xuhuan101', '2013-11-23 10:48:09');
INSERT INTO `comment` VALUES ('20', '这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀', '5', 'xuhuan101', '2013-11-23 10:48:15');
INSERT INTO `comment` VALUES ('21', '这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀', '5', 'xuhuan101', '2013-11-23 10:48:20');
INSERT INTO `comment` VALUES ('22', '这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀', '5', 'xuhuan101', '2013-11-23 10:48:24');
INSERT INTO `comment` VALUES ('23', '这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀这是这个味呀呀呀', '5', 'xuhuan101', '2013-11-23 10:48:36');
INSERT INTO `comment` VALUES ('24', '22222222222', '5', 'xuhuan101', '2013-11-23 13:10:17');
INSERT INTO `comment` VALUES ('25', '33333333333333333333333333333', '5', 'xuhuan101', '2013-11-23 13:10:25');
INSERT INTO `comment` VALUES ('26', '4444444444444444444444444', '5', 'xuhuan101', '2013-11-23 13:10:30');
INSERT INTO `comment` VALUES ('27', '5555555555555555555555555555', '5', 'xuhuan101', '2013-11-23 13:10:35');
INSERT INTO `comment` VALUES ('28', '666666666666666666666666666666666', '5', 'xuhuan101', '2013-11-23 13:10:41');
INSERT INTO `comment` VALUES ('29', '77777777777777777', '5', 'xuhuan101', '2013-11-23 13:10:56');

-- ----------------------------
-- Table structure for `feedback`
-- ----------------------------
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `content` varchar(150) NOT NULL,
  `messageBy` varchar(24) DEFAULT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feedback
-- ----------------------------
INSERT INTO `feedback` VALUES ('3', '管理员，你懂不懂', '同上', '易水寒', '2013-11-28 00:25:08');
INSERT INTO `feedback` VALUES ('4', '验证码错误', '验证码错误', '易水寒', '2013-11-28 00:27:28');
INSERT INTO `feedback` VALUES ('5', '可以通过以下方式联系我们', '可以通过以下方式联系我们', '易水寒', '2013-11-28 00:36:35');
INSERT INTO `feedback` VALUES ('6', '$error_mes', '$error_mes', '易水寒', '2013-11-28 00:36:57');
INSERT INTO `feedback` VALUES ('7', '$error_mes', '$error_mes', '易水寒', '2013-11-28 00:38:23');

-- ----------------------------
-- Table structure for `feedback_reply`
-- ----------------------------
DROP TABLE IF EXISTS `feedback_reply`;
CREATE TABLE `feedback_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback_id` int(11) NOT NULL,
  `reply_content` varchar(100) NOT NULL,
  `reply_to` varchar(10) NOT NULL,
  `reply_to_email` varchar(24) NOT NULL,
  `reply_from` varchar(10) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of feedback_reply
-- ----------------------------
INSERT INTO `feedback_reply` VALUES ('2', '5', '来吧亲', '易水寒', '510718587@qq.com', 'minishine', '2013-12-04 21:28:38');
INSERT INTO `feedback_reply` VALUES ('4', '4', 'dsafdsafas', '易水寒', '510718587@qq.com', 'minishine', '2013-12-04 23:22:30');

-- ----------------------------
-- Table structure for `resource`
-- ----------------------------
DROP TABLE IF EXISTS `resource`;
CREATE TABLE `resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `attachment` varchar(60) DEFAULT NULL,
  `remote_resource` varchar(120) DEFAULT NULL,
  `tag_id` int(11) NOT NULL,
  `contributor` varchar(12) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of resource
-- ----------------------------
INSERT INTO `resource` VALUES ('1', 'jfkdafdjka', 'fjd;askdjk;', '', 'http://www.baidu.com', '1', '徐欢欢', '2013-11-19 19:13:34');
INSERT INTO `resource` VALUES ('2', 'xuhuan', 'xuhuan', '', 'http://www.baidu.com', '3', '徐欢欢', '2013-11-19 19:15:28');
INSERT INTO `resource` VALUES ('3', 'fda', 'fdsa', '', 'http://www.baidu.com', '1', '徐欢欢', '2013-11-19 19:20:16');
INSERT INTO `resource` VALUES ('4', 'fdafdaf', 'safdasfasdf', '', 'http://www.baidu.com', '3', '徐欢欢', '2013-11-19 19:23:52');
INSERT INTO `resource` VALUES ('5', '苍老湿', '来下载吧', '201311/1384860301.jpg', 'http://www.baidu.com', '1', '徐欢欢', '2013-11-19 19:25:01');
INSERT INTO `resource` VALUES ('6', '嫂个', '真心不容易呀', '', 'http://www.baidu.com', '1', '徐欢欢', '2013-11-22 23:12:24');
INSERT INTO `resource` VALUES ('7', '有没有空找一个张我', 'jfdkalkjfjkdlafjdl;asfjlda;sdjfkl', '201311/1385133179.jpg', '', '1', '徐欢欢', '2013-11-22 23:12:59');
INSERT INTO `resource` VALUES ('8', '朝秦暮楚fafdsaf', 'dsafdasfasdfasd', '', 'http://www.baidu.com', '1', '徐欢欢', '2013-11-22 23:13:47');
INSERT INTO `resource` VALUES ('9', 'fdafdasfdsaf', 'dsafdsafasdfas', '201311/1385133250.jpg', '', '1', '徐欢欢', '2013-11-22 23:14:10');
INSERT INTO `resource` VALUES ('10', '是吗，哈哈', '是这样的', '', 'http://www.baidu.com', '1', '徐欢欢', '2013-11-22 23:31:40');
INSERT INTO `resource` VALUES ('11', '哥做的网站', '大汉是傻B', '', 'http://www.baidu.com', '1', '徐欢欢', '2013-11-22 23:36:03');
INSERT INTO `resource` VALUES ('12', '信么，不信吧', '是的，我不信啊', '201311/1385134760.jpg', '', '1', '徐欢欢', '2013-11-22 23:39:20');
INSERT INTO `resource` VALUES ('13', '大海', '朝右啊fjkd', '', 'http://www.baidu.com', '1', '徐欢欢', '2013-11-22 23:39:48');
INSERT INTO `resource` VALUES ('14', 'whatjfkd', 'fkda;fjkda;k', '', 'http://www.baidu.com', '2', '徐欢欢', '2013-11-22 23:41:37');
INSERT INTO `resource` VALUES ('15', 'ffff', 'fdafdafs', '', 'http://www.baidu.com', '1', '徐欢欢', '2013-11-23 00:23:10');
INSERT INTO `resource` VALUES ('16', 'fffffffffdasfads', 'fdsafdsafas', '', 'http://www.baidu.com', '2', '徐欢欢', '2013-11-23 00:23:24');
INSERT INTO `resource` VALUES ('17', 'fffff', 'fdasfdasfas', '', 'http://www.baidu.com', '1', '徐欢欢', '2013-11-23 00:23:35');
INSERT INTO `resource` VALUES ('18', 'fdasfdasfa', 'fdsafdasfsafadsfdsafdf', '', 'http://www.baidu.com', '1', '徐欢欢', '2013-11-23 00:23:48');
INSERT INTO `resource` VALUES ('19', 'fdsafdasf', '魂牵梦萦魂牵梦萦', '', 'http://www.baidu.com', '1', '徐欢欢', '2013-11-23 00:24:18');
INSERT INTO `resource` VALUES ('20', 'fda', 'fdafda', '201311/1385270649.xls', '', '1', '徐欢欢', '2013-11-24 13:24:09');
INSERT INTO `resource` VALUES ('21', '测试', '啦啦', '201311/1385270876.et', '', '1', '易水寒', '2013-11-24 13:27:56');
INSERT INTO `resource` VALUES ('22', '不登录', '来呀', '', 'http://www.baidu.com', '4', 'Guest', '2013-11-24 14:07:35');
INSERT INTO `resource` VALUES ('23', '测试', '测试', '201311/127ce644493f4a17d9e18507959a8127.xls', '', '4', '易水寒', '2013-11-24 17:05:33');
INSERT INTO `resource` VALUES ('26', '魂牵梦萦fdaf', 'dsfasdfads', '', '', '4', '易水寒', '2013-11-24 21:21:22');
INSERT INTO `resource` VALUES ('27', '易水寒', '你好吧亲，又要去厦门了', '', '', '4', '易水寒', '2013-11-25 14:58:23');
INSERT INTO `resource` VALUES ('28', '消失不是我', '消失真的不是我逞强', '', '', '4', '易水寒', '2013-11-25 14:59:12');
INSERT INTO `resource` VALUES ('29', 'wocao ', 'fjdkaflk', '', '', '4', '易水寒', '2013-11-27 23:30:57');
INSERT INTO `resource` VALUES ('30', '标题不能为空', '资源描述不能为空', '', 'http://www.baidu.com', '1', '易水寒', '2013-11-27 23:40:59');
INSERT INTO `resource` VALUES ('31', '一个测试', '朝右aljklk;kj;', '201312/0940aa8c41079c5d3183fe57b720b402.txt', '', '3', '易水寒', '2013-12-04 20:15:47');
INSERT INTO `resource` VALUES ('32', '你好吗', '朝右草叶；', '201312/947e4a571ca5bdbc339cb4297063ea0f.txt', '', '1', '易水寒', '2013-12-04 20:29:21');
INSERT INTO `resource` VALUES ('33', '来吧亲', '你好吧', '201312/b7c45059bac1050b7f58bb6c36c46d6f.txt', '', '4', '易水寒', '2013-12-04 20:42:46');
INSERT INTO `resource` VALUES ('34', '我要分享一个资源', '需sfdafdsafasdfas', '', 'http://localhost/share/index.php?r=admin/index/main', '3', '易水寒', '2013-12-04 21:29:07');
INSERT INTO `resource` VALUES ('35', 'gogo', 'fjdkajfdlasjfkal', '201312/9681aae405633d22345042723f6e8d87.txt', '', '5', '易水寒', '2013-12-04 21:39:54');
INSERT INTO `resource` VALUES ('36', '曾哥', '；fjda;sfjd;lsajfsdafjla;', '201312/46607a4bbda946cecb15b5d93676ac07.txt', '', '4', '易水寒', '2013-12-04 23:24:26');
INSERT INTO `resource` VALUES ('37', '你好吧', 'jfkdlasjfkd;lsajkf;', '', 'http://localhost/share/index.php?r=admin/index/main', '4', '易水寒', '2013-12-04 23:31:29');

-- ----------------------------
-- Table structure for `tags`
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(12) DEFAULT NULL,
  `status` varchar(3) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES ('3', '趣事', '1', '2013-11-23 21:19:49');
INSERT INTO `tags` VALUES ('4', '课后习题答案', '1', '2013-11-23 21:23:28');
INSERT INTO `tags` VALUES ('5', '入党申请书', '1', '2013-11-23 21:23:42');
INSERT INTO `tags` VALUES ('6', '东西ffdfdfd', '0', '2013-11-24 13:52:00');
INSERT INTO `tags` VALUES ('7', '苹果jfdk', '1', '2013-11-24 13:53:30');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(24) NOT NULL,
  `status` varchar(3) NOT NULL DEFAULT '1',
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nickname` (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('3', 'xuhuan102', 'b1d80df25d5497c085d0650c85ea857c', 'xuhuan102@q.com', '0', '2013-11-18 16:40:58');
INSERT INTO `user` VALUES ('4', '易水寒', '4804083ece0b307329d6f62be1855b06', '510718587@qq.com', '1', '2013-11-24 13:23:51');
