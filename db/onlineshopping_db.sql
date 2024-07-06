/*
 Navicat Premium Data Transfer

 Source Server         : root
 Source Server Type    : MySQL
 Source Server Version : 80033 (8.0.33)
 Source Host           : localhost:3306
 Source Schema         : onlineshopping_db

 Target Server Type    : MySQL
 Target Server Version : 80033 (8.0.33)
 File Encoding         : 65001

 Date: 06/07/2024 12:24:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mobile` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'Chandupa', 'Jayalath', 'chandupajayalath33@gmail.com', '$2y$10$pptUlVo5oVd/jjb8/mBge.c2rB.cE8iOZyl29ULzU7prd.UwhrBQW', '0715221982');

-- ----------------------------
-- Table structure for order_items
-- ----------------------------
DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items`  (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `orders_order_id` int NOT NULL,
  `products_product_id` int NOT NULL,
  `product_name` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_image` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `order_date` datetime NOT NULL,
  `product_price` decimal(10, 0) NOT NULL,
  `product_quantity` int NOT NULL,
  `users_user_id` int NOT NULL,
  PRIMARY KEY (`item_id`) USING BTREE,
  INDEX `fk_order_items_products1_idx`(`products_product_id` ASC) USING BTREE,
  INDEX `fk_order_items_orders1_idx`(`orders_order_id` ASC) USING BTREE,
  INDEX `fk_order_items_users1_idx`(`users_user_id` ASC) USING BTREE,
  CONSTRAINT `fk_order_items_orders1` FOREIGN KEY (`orders_order_id`) REFERENCES `orders` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_order_items_products1` FOREIGN KEY (`products_product_id`) REFERENCES `products` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_order_items_users1` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 66 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_items
-- ----------------------------
INSERT INTO `order_items` VALUES (55, 49, 3, 'Modern Cloth', 'cloth_2.jpg', '2024-07-05 13:34:34', 3500, 1, 1);
INSERT INTO `order_items` VALUES (56, 50, 3, 'Modern Cloth', 'cloth_2.jpg', '2024-07-05 14:02:18', 3500, 1, 1);
INSERT INTO `order_items` VALUES (60, 54, 4, 'Modern Cloth 2', 'cloth_3.jpg', '2024-07-05 14:12:13', 5000, 1, 1);
INSERT INTO `order_items` VALUES (61, 55, 2, 'FUKUJE', 'cloth_1.jpg', '2024-07-05 14:26:07', 3200, 1, 1);
INSERT INTO `order_items` VALUES (65, 59, 2, 'FUKUJE', 'cloth_1.jpg', '2024-07-06 05:59:21', 3200, 1, 1);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `order_cost` decimal(6, 2) NOT NULL,
  `users_user_id` int NOT NULL,
  `order_status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'on_hold',
  `user_phone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_city` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`) USING BTREE,
  INDEX `fk_orders_users_idx`(`users_user_id` ASC) USING BTREE,
  CONSTRAINT `fk_orders_users` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 60 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (49, 3500.00, 1, 'Not Paid', '715221982', 'Anuradhapura', 'LC 59 National Housing Scheme Airport road Anuradhapura', '2024-07-05 13:34:34');
INSERT INTO `orders` VALUES (50, 3500.00, 1, 'paid', '715221982', 'Anuradhapura', 'LC 59 National Housing Scheme Airport road Anuradhapura', '2024-07-05 14:02:18');
INSERT INTO `orders` VALUES (54, 5000.00, 1, 'Not Paid', '715221982', 'Anuradhapura', 'LC 59 National Housing Scheme Airport road Anuradhapura', '2024-07-05 14:12:13');
INSERT INTO `orders` VALUES (55, 3200.00, 1, 'Not Paid', '715221982', 'Anuradhapura', 'LC 59 National Housing Scheme Airport road', '2024-07-05 14:26:07');
INSERT INTO `orders` VALUES (59, 3200.00, 1, 'Not Paid', '715221982', 'Anuradhapura', 'LC 59 National Housing Scheme Airport road Anuradhapura', '2024-07-06 05:59:21');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_category` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_image2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `product_image3` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `product_image4` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `product_price` decimal(8, 2) NOT NULL,
  `product_special_offer` tinyint NOT NULL,
  `product_color` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`product_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'NIKE', 'featured', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ligula massa', 'cloth_4.jpg', 'cloth_4.jpg', 'cloth_4.jpg', 'cloth_4.jpg', 7500.00, 10, 'Black');
INSERT INTO `products` VALUES (2, 'FUKUJE', 'full suite', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ligula massa', 'cloth_1.jpg', 'cloth_2.jpg', 'cloth_4.jpg', 'cloth_2.jpg', 3200.00, 10, 'white');
INSERT INTO `products` VALUES (3, 'Modern Cloth', 'full suite', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ligula massa', 'cloth_2.jpg', 'cloth_3.jpg', 'cloth_4.jpg', 'cloth_1.jpg', 3500.00, 10, 'bg');
INSERT INTO `products` VALUES (4, 'Wedding Cloth', 'full suite', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ligula massa', 'cloth_3.jpg', 'cloth_1.jpg', 'cloth_1.jpg', 'cloth_1.jpg', 5000.00, 10, 'bg');
INSERT INTO `products` VALUES (5, 'Nike Cap', 'cap', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ligula massa', 'cap1.jpg', 'cap1.jpg', 'cap1.jpg', 'cap1.jpg', 2500.00, 5, 'Blue');
INSERT INTO `products` VALUES (6, 'Green T-Shirt', 'tshirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ligula massa', 'tshirt.jpg', 'tshirt.jpg', 'tshirt.jpg', 'tshirt.jpg', 1500.00, 5, 'Green');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  UNIQUE INDEX `UX_Constraint`(`user_email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Chandupa Jayalath', 'chandupajayalath20@gmail.com', '$2y$10$DHf22EWyojlInriQo9iwVeK2N27I5wcdL7B4MWvhKZaDZZY2YFzbK');

SET FOREIGN_KEY_CHECKS = 1;
