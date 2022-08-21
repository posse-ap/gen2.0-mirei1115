DROP DATABASE IF EXISTS quizy_db;
CREATE DATABASE quizy_db;
USE quizy_db;

DROP TABLE IF EXISTS prefectures; -- POSSE課題big_questions
CREATE TABLE prefectures (
    -- ,で各引数に対する条件を提示(カラムが変わる)
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, -- ID
    prefecture_name VARCHAR(225) NOT NULL -- 都道府県の名前
);

DROP TABLE IF EXISTS questions;
CREATE TABLE questions (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, -- 都道府県(大ボス)と紐づけ
    prefecture_id INT NOT NULL, -- 都道府県ID
    image VARCHAR(225) NOT NULL -- 問題写真
);

DROP TABLE IF EXISTS choices;
CREATE TABLE choices (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, -- ID
    question_id INT NOT NULL, -- 問題番号ID
    choice_name VARCHAR(225) NOT NULL, -- 選択肢の値
    valid INT NOT NULL
);

INSERT INTO prefectures (prefecture_name) VALUES ('東京の難読地名クイズ'), ('広島の難読地名クイズ');

INSERT INTO questions (prefecture_id, image) VALUES
(1, 'quizy1.jpg'), (1, 'quizy2.jpg'), (2, 'quizy3.jpg');

INSERT INTO choices (question_id, choice_name, valid) VALUES
(1, 'たかなわ', 1),
(1, 'たかわ', 0),
(1, 'こうわ', 0),
(2, 'かめいど', 1),
(2, 'かめど', 0),
(2, 'かめと', 0),
(3, 'むかいなだ', 1),
(3, 'むこうひら', 0),
(3, 'むきひら', 0);