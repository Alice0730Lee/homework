以購物車為中心做一個購物網站
    商品(資料表)
    搜尋
    添加至購物車
    收藏
基本會員登入功能
    訪客
    登入(帳密寫入資料表)
    登出
購物車功能（畫面跳轉
    刪除商品
    結算

首頁
    登入
    搜尋(where like)
    分類(group by)
    收藏(需登入)
    加入購物車(用陣列存取)
    
商品資料庫
    商品id
    商品名稱
    商品圖
    商品價格

create database CYshop DEFAULT CHARACTER SET utf8;

use CYshop;

create table User(
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(40) NOT NULL,
    tel VARCHAR(10) NOT NULL,
    userName VARCHAR(200) NOT NULL,
    userPassword VARCHAR(200) NOT NULL,
    PRIMARY KEY (id)
);

create table product(
    id INT NOT NULL AUTO_INCREMENT,
    pName VARCHAR(200) NOT NULL,
    pImg BLOB NULL,
    price INT NOT NULL,
    PRIMARY KEY (id)
)


delimiter $$
create procedure pro_p2Rand()
begin
    declare name VARCHAR (40) ;
    declare p INT; 
    declare j int DEFAULT 1;

        while j <= 10 do
            set name = LPAD(floor(rand()*10000),5,"a");
            insert into product (pName, price) values (name,floor(rand()*1000+50));
            set j = j+1;
        end while;
end $$
delimiter ;