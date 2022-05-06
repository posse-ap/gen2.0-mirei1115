-- 紐づけルール：同じ型でないといけない
-- DESC テーブル名 AUTO_INCREMENTが設定されているか

DROP SCHEMA IF EXISTS webapp_db;
CREATE SCHEMA webapp_db;
USE webapp_db;

--  学習コンテンツテーブル
DROP TABLE IF EXISTS contents; -- 教材
CREATE TABLE contents (
    -- ,で各引数に対する条件を提示(カラムが変わる)
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    contents_id INT NOT NULL, -- 個々の教材名添付番号
    contents_name VARCHAR(225) NOT NULL -- 個々の教材名
);

-- 学習言語テーブル
DROP TABLE IF EXISTS languages;
CREATE TABLE languages (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    languages_id INT NOT NULL, -- 個々の言語名添付番号
    languages_name VARCHAR(225) NOT NULL -- 個々の言語名
);

-- 学習時間合計テーブル
DROP TABLE IF EXISTS studies;
CREATE TABLE studies (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    study_date VARCHAR(225) NOT NULL, -- 学習した日付
    study_time INT NOT NULL, -- 学習時間
    contents_id INT NOT NULL, -- 個々の教材名添付番号
    languages_id INT NOT NULL -- 個々の言語名添付番号
    -- FOREIGN KEY idx_languages (languages_id) REFERENCES languages (id) on delete cascade,
    -- FOREIGN KEY idx_contents (contents_id) REFERENCES contents (id) on delete cascade,
);

INSERT INTO contents (contents_id, contents_name) VALUES
(1, 'ドットインストール'),
(2, 'N予備校'),
(3, 'POSSE課題');

INSERT INTO languages (languages_id, languages_name) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'JavaScript'),
(4, 'PHP'),
(5, 'Laravel'),
(6, 'SQL'),
(7, 'SHELL'),
(8, '情報システム基礎知識(その他)');

INSERT INTO studies (study_date, study_time, contents_id, languages_id) VALUES
('2022-03-02', 2, 2, 3),
('2022-03-05', 1, 2, 1),
('2022-03-10', 5, 1, 3),
('2022-03-13', 4, 3, 2),
('2022-03-21', 3, 1, 1),
('2022-04-06', 10, 1, 4),
('2022-04-15', 6, 2, 5),
('2022-04-17', 8, 3, 2),
('2022-04-27', 7, 2, 3),
('2022-04-29', 3, 1, 4),
('2022-05-03', 9, 3, 1),
('2022-05-06', 2, 2, 3),
('2022-05-12', 1, 2, 1),
('2022-05-22', 5, 1, 3),
('2022-05-30', 4, 3, 2),
('2022-05-31', 3, 1, 1);