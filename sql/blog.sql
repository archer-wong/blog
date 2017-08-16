/*
Navicat MySQL Data Transfer

Source Server         :
Source Server Version : 50552
Source Host           :
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50552
File Encoding         : 65001

Date: 2017-08-16 11:05:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_title` varchar(100) DEFAULT '' COMMENT '//标题',
  `art_tag` varchar(100) DEFAULT '' COMMENT '//关键词',
  `art_description` varchar(255) DEFAULT '' COMMENT '//描述',
  `art_thumb` varchar(255) DEFAULT '' COMMENT '//缩略图',
  `art_content` text COMMENT '//内容',
  `art_time` int(11) DEFAULT '0' COMMENT '//发布时间',
  `art_editor` varchar(50) DEFAULT '' COMMENT '//作者',
  `art_view` int(11) DEFAULT '0' COMMENT '//查看次数',
  `cate_id` int(11) DEFAULT '0' COMMENT '//分类id',
  PRIMARY KEY (`art_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章';

-- ----------------------------
-- Records of blog_article
-- ----------------------------

-- ----------------------------
-- Table structure for blog_category
-- ----------------------------
DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE `blog_category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(50) DEFAULT NULL COMMENT ' 分类名称',
  `cate_title` varchar(255) DEFAULT NULL COMMENT '分类说明',
  `cate_keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `cate_description` varchar(255) DEFAULT NULL COMMENT '描述',
  `cate_view` int(10) DEFAULT '0' COMMENT '查看次数',
  `cate_order` tinyint(4) DEFAULT '0' COMMENT '排序',
  `cate_pid` int(11) DEFAULT '0' COMMENT '父级id',
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='文章分类';

-- ----------------------------
-- Records of blog_category
-- ----------------------------
INSERT INTO `blog_category` VALUES ('1', '首页', '', '', '', '4', '1', '0');
INSERT INTO `blog_category` VALUES ('2', 'LARAVEL框架', '', '', '', '10', '2', '0');
INSERT INTO `blog_category` VALUES ('3', '学习路线', '', '', '', '6', '3', '0');
INSERT INTO `blog_category` VALUES ('4', '点滴', '', '', '', '1', '4', '0');

-- ----------------------------
-- Table structure for blog_config
-- ----------------------------
DROP TABLE IF EXISTS `blog_config`;
CREATE TABLE `blog_config` (
  `conf_id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_title` varchar(50) DEFAULT '' COMMENT '//标题',
  `conf_name` varchar(50) DEFAULT '' COMMENT '//名称',
  `conf_content` text COMMENT '//内容',
  `conf_tips` varchar(255) DEFAULT '' COMMENT '//简介',
  `field_type` varchar(50) DEFAULT '' COMMENT '//类型',
  `field_value` varchar(255) DEFAULT '' COMMENT '//类型值',
  `conf_order` int(11) DEFAULT '0' COMMENT '//排序',
  PRIMARY KEY (`conf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_config
-- ----------------------------
INSERT INTO `blog_config` VALUES ('1', '网站标题', 'web_title', 'archer_wong的博客', '网站标题的配置', 'input', '', '1');
INSERT INTO `blog_config` VALUES ('2', '辅助标题', 'seo_title', '宝剑锋从磨砺出,梅花香自苦寒来', '辅助标题展示', 'input', '', '2');
INSERT INTO `blog_config` VALUES ('3', '关键词', 'keywords', 'laravel学习,php学习', '', 'input', '', '3');
INSERT INTO `blog_config` VALUES ('4', '描述', 'description', 'archer_wong的学习空间', '', 'textarea', '', '4');
INSERT INTO `blog_config` VALUES ('5', '版权信息', 'copyright', 'Design by archerwong <a href=\"http://www.baidu.com/\" target=\"_blank\">http://www.baidu.com</a>', '', 'textarea', '', '5');
INSERT INTO `blog_config` VALUES ('6', '统计代码', 'web_count', '统计代码', '1', 'textarea', '', '6');

-- ----------------------------
-- Table structure for blog_links
-- ----------------------------
DROP TABLE IF EXISTS `blog_links`;
CREATE TABLE `blog_links` (
  `link_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '//友情链接的名称',
  `link_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '//友情链接的标题',
  `link_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '//友情链接的链接',
  `link_order` int(11) NOT NULL DEFAULT '0' COMMENT '//友情链接的排序',
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of blog_links
-- ----------------------------

-- ----------------------------
-- Table structure for blog_migrations
-- ----------------------------
DROP TABLE IF EXISTS `blog_migrations`;
CREATE TABLE `blog_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of blog_migrations
-- ----------------------------

-- ----------------------------
-- Table structure for blog_navs
-- ----------------------------
DROP TABLE IF EXISTS `blog_navs`;
CREATE TABLE `blog_navs` (
  `nav_id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_name` varchar(50) DEFAULT '' COMMENT '//名称',
  `nav_alias` varchar(50) DEFAULT '' COMMENT '//别名',
  `nav_url` varchar(255) DEFAULT '' COMMENT '//url',
  `nav_order` int(11) DEFAULT '0' COMMENT '//排序',
  PRIMARY KEY (`nav_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_navs
-- ----------------------------
INSERT INTO `blog_navs` VALUES ('1', '首页', 'Home', 'http://www.archerwong.cn/', '1');
INSERT INTO `blog_navs` VALUES ('2', 'Laravel框架', 'Laravel', 'http://www.archerwong.cn/cate/2', '2');
INSERT INTO `blog_navs` VALUES ('3', '学习路线', 'RoadToBetter', 'http://www.archerwong.cn/cate/3', '3');
INSERT INTO `blog_navs` VALUES ('4', '点滴', 'Life', 'http://www.archerwong.cn/cate/4', '4');

-- ----------------------------
-- Table structure for blog_user
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin_users`;
CREATE TABLE `blog_admin_users` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `user_name` varchar(50) DEFAULT NULL COMMENT '用户名',
  `user_pass` varchar(255) DEFAULT NULL COMMENT '用户密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员';

-- ----------------------------
-- Records of blog_user
-- ----------------------------
INSERT INTO `blog_admin_users` VALUES ('1', 'admin', 'eyJpdiI6Imh1Z1p5emJMSTVNd1NRTFdScUVaSXc9PSIsInZhbHVlIjoiU2NGNlplMTlEWHhYNGhRb05qalBYZz09IiwibWFjIjoiMTJjMjg2MzlmNjY1NWY0NmFlMjNlNmJmOWU4MzI4YzQyMzkwM2Y3NzgxMzg0YWU2ZjYzNDE1NTVkNGVjZTg3YyJ9');
