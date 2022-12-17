/*
 Navicat Premium Data Transfer

 Source Server         : Home
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : fotomoto

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 17/12/2022 21:02:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'fotomotoadmin', '$2y$10$8UM5RtSRjUpv273UdnJFhu3LXyVdjFVdxX47t0Xfg1mxH/ZoM1b1i');

-- ----------------------------
-- Table structure for booking
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_as` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `invoice_id` int(11) NULL DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `price` int(11) NULL DEFAULT NULL,
  `book_date` date NULL DEFAULT NULL,
  `additional` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status_order` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `proof_payment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES (1, 'Fino and Sonia', 5868682, 'Wedding', 2000000, '2022-12-17', 'sample', 'Process', 1, 'proof_payment_5868682.png', '2022-12-17 21:00:33', '2022-12-17 21:00:33');
INSERT INTO `booking` VALUES (2, 'Ricardo Agung', 7405775, 'Pre-Wedding', 500000, '2022-12-17', 'sjdnasind', 'Reject', 1, 'proof_payment_7405775.png', '2022-12-17 16:58:25', '2022-12-17 16:58:25');
INSERT INTO `booking` VALUES (3, 'Fino Basri', 2183465, 'Model Photo Session', 200000, '2023-01-07', 'New', 'Cancel', 1, NULL, '2022-12-17 17:09:07', '2022-12-17 17:09:07');
INSERT INTO `booking` VALUES (4, 'Fino Basri', 9681556, 'Pre-Wedding', 500000, '2023-01-07', 'sample cancel', 'Cancel', 1, NULL, '2022-12-17 17:10:19', '2022-12-17 17:10:19');
INSERT INTO `booking` VALUES (5, 'Ricardo Agung', 748264, 'Wedding', 2000000, '2022-12-17', 'sample', 'Process', 1, 'proof_payment_748264.jpg', '2022-12-17 17:14:00', '2022-12-17 17:14:00');
INSERT INTO `booking` VALUES (6, 'Ricardo Agung', 3907473, 'Wedding', 2000000, '2022-12-24', 'sample', 'Payed', 1, 'proof_payment_3907473.png', '2022-12-17 20:49:08', '2022-12-17 20:49:08');

-- ----------------------------
-- Table structure for portfolio
-- ----------------------------
DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE `portfolio`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pict` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for reject
-- ----------------------------
DROP TABLE IF EXISTS `reject`;
CREATE TABLE `reject`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` int(11) NULL DEFAULT NULL,
  `reason` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reject
-- ----------------------------
INSERT INTO `reject` VALUES (1, 7405775, 'Cancel');

-- ----------------------------
-- Table structure for testimoni
-- ----------------------------
DROP TABLE IF EXISTS `testimoni`;
CREATE TABLE `testimoni`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NULL DEFAULT NULL,
  `testimoni` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of testimoni
-- ----------------------------
INSERT INTO `testimoni` VALUES (1, 1, 'Good Service!', 1, '2022-12-17 20:05:43');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `full_name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'finobsr@gmail.com', 'Fino Basri', '081364243280', '$2y$10$h.YztKg1KOJf0ICKPCTNUe6KuWwCnaqvOhyFOX9tl3xNtCMq9j7C.');
INSERT INTO `user` VALUES (2, 'ricardo@gmail.com', 'Ricardo', '081364243280', '$2y$10$qwgvOXbY5jT00NN1pxHEIugklMkaCbLQBMoED/gjIjWj7wyCrKTIG');

SET FOREIGN_KEY_CHECKS = 1;
