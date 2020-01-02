/*
 Navicat Premium Data Transfer

 Source Server         : php
 Source Server Type    : MySQL
 Source Server Version : 80018
 Source Host           : 47.106.197.31:3306
 Source Schema         : econtest

 Target Server Type    : MySQL
 Target Server Version : 80018
 File Encoding         : 65001

 Date: 02/01/2020 10:57:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account_admin
-- ----------------------------
DROP TABLE IF EXISTS `account_admin`;
CREATE TABLE `account_admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of account_admin
-- ----------------------------
INSERT INTO `account_admin` VALUES (1, '123', '123');

-- ----------------------------
-- Table structure for account_user
-- ----------------------------
DROP TABLE IF EXISTS `account_user`;
CREATE TABLE `account_user`  (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `qq` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `info` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `major` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `school` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`uid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of account_user
-- ----------------------------
INSERT INTO `account_user` VALUES (1, '2017210079', '210079', '重邮竞赛', '123', '20200102101253.jpg', '123', '123', '321', '计算机科学与技术', '计算机科学与技术学院');
INSERT INTO `account_user` VALUES (2, '2017210108', '210108', '牛奥林', '14367790865', '20200102102603.jpg', '1262280723@qq.com', '1262280723', 'sdfdsfsdfds', NULL, NULL);

-- ----------------------------
-- Table structure for contest_join
-- ----------------------------
DROP TABLE IF EXISTS `contest_join`;
CREATE TABLE `contest_join`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NULL DEFAULT NULL,
  `created` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tid` int(11) NULL DEFAULT NULL,
  `uid` int(11) NULL DEFAULT NULL,
  `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `role` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contest_join
-- ----------------------------
INSERT INTO `contest_join` VALUES (1, 1, '1577761703', 4, 1, '2017210079', 1, 1);
INSERT INTO `contest_join` VALUES (2, 4, '1577880620', 5, 1, '2017210079', 1, 1);
INSERT INTO `contest_join` VALUES (3, 1, '1577881703', 4, 2, '2123213', 1, 2);
INSERT INTO `contest_join` VALUES (5, NULL, NULL, 1, 1, NULL, 1, 2);
INSERT INTO `contest_join` VALUES (6, NULL, NULL, 2, 1, NULL, 1, 2);
INSERT INTO `contest_join` VALUES (10, NULL, NULL, 3, 1, NULL, 1, 2);
INSERT INTO `contest_join` VALUES (11, NULL, NULL, 1, 2, NULL, 1, 2);
INSERT INTO `contest_join` VALUES (12, 4, '1577933088', 6, 1, '2017210079', 1, 1);

-- ----------------------------
-- Table structure for contest_list
-- ----------------------------
DROP TABLE IF EXISTS `contest_list`;
CREATE TABLE `contest_list`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `intro` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `begin` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `stop` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `peoplenum` int(11) NULL DEFAULT NULL,
  `imagesrc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contest_list
-- ----------------------------
INSERT INTO `contest_list` VALUES (1, '“互联网+”创新创业大赛', '“互联网+”创新创业大赛', '2020年1月1日', '2020年1月30日', NULL, 1, 'https://cy.ncss.org.cn/index.html', 4, '20200102101104.png', '1577931064');
INSERT INTO `contest_list` VALUES (2, '“华为杯”中国大学生智能设计竞赛', '“华为杯”中国大学生智能设计竞赛', '2020年1月1日', '2020年1月20日', NULL, 0, 'http://www.aidcstu.org.cn/', 4, '20200102101146.png', '1577931106');
INSERT INTO `contest_list` VALUES (3, '微软“创新杯”', '微软“创新杯”', '2020年1月3日', '2020年1月7日', NULL, 1, 'https://imaginecup.microsoft.com/zh-cn/china', 4, '20200102101342.png', '1577931222');
INSERT INTO `contest_list` VALUES (4, '全国大学生数学建模竞赛', '全国大学生数学建模竞赛', '2020年1月2日', '2020年1月5日', NULL, 1, 'http://www.mcm.edu.cn/', 3, '20200102101604.png', '1577931364');

-- ----------------------------
-- Table structure for contest_team
-- ----------------------------
DROP TABLE IF EXISTS `contest_team`;
CREATE TABLE `contest_team`  (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `created` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `intro` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tcid` int(11) NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cid` int(11) NULL DEFAULT NULL,
  `peoplenum` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`tid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contest_team
-- ----------------------------
INSERT INTO `contest_team` VALUES (1, '2019-12-31 00:00:00.000000', '无敌', '123', 1, '1', 1, 4);
INSERT INTO `contest_team` VALUES (2, '1577761123', '优秀', '131313', 1, '1', 1, 6);
INSERT INTO `contest_team` VALUES (3, '1577761554', '求大佬带', '123123', 1, '1', 1, 3);
INSERT INTO `contest_team` VALUES (4, '1577761703', 'Wowo', '123123', 1, '1', 1, 4);
INSERT INTO `contest_team` VALUES (5, '1577880620', '太强大了', '121', 1, '1', 4, 6);
INSERT INTO `contest_team` VALUES (6, '1577933088', '数模小组', '无', 1, '1', 4, 3);

-- ----------------------------
-- Table structure for find_back_captcha
-- ----------------------------
DROP TABLE IF EXISTS `find_back_captcha`;
CREATE TABLE `find_back_captcha`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `captcha` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `generate_time` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of find_back_captcha
-- ----------------------------
INSERT INTO `find_back_captcha` VALUES (1, '2017210079', '0873', '1577932256');

SET FOREIGN_KEY_CHECKS = 1;
