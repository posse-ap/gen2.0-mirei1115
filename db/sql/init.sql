-- 紐づけルール：同じ型でないといけない
-- DESC テーブル名 AUTO_INCREMENTが設定されているか

DROP SCHEMA IF EXISTS quizy_db;
CREATE SCHEMA quizy_db;
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
(1, 'takanawa.png'), (1, 'kameido.png'), (2, 'mukainada.png');

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


-- DROP TABLE IF EXISTS choices;
-- CREATE TABLE choices (
--     id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, -- ID
--     prefecture_id INT NOT NULL, -- 都道府県ID
--     question_id INT NOT NULL, -- 問題番号ID
--     choice0 VARCHAR(225) NOT NULL,
--     choice1 VARCHAR(225) NOT NULL,
--     choice2 VARCHAR(225) NOT NULL,
--     image VARCHAR(225) NOT NULL -- 問題写真
-- );
-- INSERT INTO choices (id, prefecture_id, question_id, choice0, choice1, choice2, image) VALUES
-- (1, 1, 1, 'たかなわ', 'こうわ', 'たかわ', '1_1.jpg'),
-- (2, 1, 2, 'かめいど', 'かめと', 'かめど', '1_2.jpg'),
-- (3, 1, 3, 'こうじまち', 'かゆまち', 'おかとまち', '1_3.jpg'),
-- (4, 1, 4, 'おなりもん', 'おかどもん', 'ごせいもん', '1_4.jpg'),
-- (5, 1, 5, 'とどろき', 'たたら', 'たたりき', '1_5.jpg'),
-- (6, 1, 6, 'しゃくじい', 'せきこうい', 'いじい', '1_6.jpg'),
-- (7, 1, 7, 'ぞうしき', 'ざっしき', 'ざっしょく', '1_7.jpg'),
-- (8, 1, 8, 'おかちまち', 'ごしろちょう', 'みとちょう', '1_8.jpg'),
-- (9, 1, 9, 'ししぼね', 'ろっこつ', 'しこね', '1_9.jpg'),
-- (10, 1, 10, 'こぐれ', 'こしゃく', 'こばく', '1_10.jpg'),
-- (11, 2, 1, 'むかいなだ', 'むこうひら', 'むきひら', '2_1.jpg'),
-- (12, 2, 2, 'みつぎ', 'おしらべ', 'みよし', '2_2.jpg'),
-- (13, 2, 3, 'かなやま', 'ぎんざん', 'きやま', '2_3.jpg'),
-- (14, 2, 4, 'とよひ', 'としか', 'とよか', '2_4.jpg'),
-- (15, 2, 5, 'いしぐろ', 'いしあぜ', 'しゃくぜ', '2_5.jpg'),
-- (16, 2, 6, 'みよし', 'みつぎ', 'みかた', '2_6.jpg'),
-- (17, 2, 7, 'うずい', 'もみち', 'くもおり', '2_7.jpg'),
-- (18, 2, 8, 'すもも', 'でこぽん', 'ぽんかん', '2_8.jpg'),
-- (19, 2, 9, 'おおちごとうげ', 'おおちえとうげ', 'おうちごとうげ', '2_9.jpg'),
-- (20, 2, 10, 'よおろよばら', 'てっぽよばら', 'ていぼよはら', '2_10.jpg');