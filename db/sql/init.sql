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

DROP TABLE IF EXISTS choices;
CREATE TABLE choices (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, -- ID
    prefecture_id INT NOT NULL, -- 都道府県ID
    question_id INT NOT NULL, -- 問題番号ID
    choice0 VARCHAR(225) NOT NULL
    choice1 VARCHAR(225) NOT NULL
    choice2 VARCHAR(225) NOT NULL
    image VARCHAR(225) NOT NULL -- 問題写真
);

INSERT INTO prefectures (id, prefecture_name) VALUES (1, '東京の難読地名クイズ'), (2, '広島の難読地名クイズ');

INSERT INTO choices (id, prefecture_id, question_id, choice0, choice1, choice2, image) VALUES
(1, 1, 1, 'たかなわ', 'こうわ', 'たかわ', 'T1.jpg'),
(2, 1, 2, 'かめいど', 'かめと', 'かめど', 'T2.jpg'),
(3, 1, 3, 'こうじまち', 'かゆまち', 'おかとまち', 'T3.jpg'),
(4, 1, 4, 'ごせいもん', 'おかどもん', 'おなりもん', 'T4.jpg'),
(5, 1, 5, 'とどろき', 'たたら', 'たたりき', 'T5.jpg'),
(6, 1, 6, 'いじい', 'せきこうい', 'しゃくじい', 'T6.jpg'),
(7, 1, 7, 'ざっしょく', 'ざっしき', 'ぞうしき', 'T7.jpg'),
(8, 1, 8, 'おかちまち', 'ごしろちょう', 'みとちょう', 'T8.jpg'),
(9, 1, 9, 'しこね', 'ろっこつ', 'ししぼね', 'T9.jpg'),
(10, 1, 10, 'こばく', 'こしゃく', 'こぐれ', 'T10.jpg'),
(11, 2, 1, 'むきひら', 'むこうひら', 'むかいなだ', 'H1.jpg'),
(12, 2, 2, 'みつぎ', 'おしらべ', 'みよし', 'H2.jpg'),
(13, 2, 3, 'かなやま', 'ぎんざん', 'きやま', 'H3.jpg'),
(14, 2, 4, 'とよひ', 'としか', 'とよか', 'H4.jpg'),
(15, 2, 5, 'しゃくぜ', 'いしあぜ', 'いしぐろ', 'H5.jpg'),
(16, 2, 6, 'みかた', 'みつぎ', 'みよし', 'H6.jpg'),
(17, 2, 7, 'もみち', 'うずい', 'くもおり', 'H7.jpg'),
(18, 2, 8, 'ぽんかん', 'でこぽん', 'すもも', 'H8.jpg'),
(19, 2, 9, 'おおちごとうげ', 'おおちえとうげ', 'おうちごとうげ', 'H9.jpg'),
(20, 2, 10, 'てっぽよばら', 'よおろほよばら', 'ていぼよはら', 'H10.jpg');

-- INSERT INTO questions ()


-- 非効率
-- DROP TABLE IF EXISTS questions;
-- CREATE TABLE questions (
--     id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, -- 都道府県(大ボス)と紐づけ
--     prefecture_id INT NOT NULL, -- 都道府県ID
--     image VARCHAR(225) NOT NULL -- 問題写真
-- );
-- DROP TABLE IF EXISTS choices;
-- CREATE TABLE choices (
--     id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, -- ID
--     choice_id INT NOT NULL, -- 問題番号ID
--     choice_name VARCHAR(225) NOT NULL --
-- );