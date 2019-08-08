--創建資料庫
create database shopdata DEFAULT CHARACTER SET utf8;

--切換資料庫
use shopdata;

--創建資料表Customer
create table Customer (
    Cid INT NOT NULL AUTO_INCREMENT,
    Cimg BLOB NULL,
    Cname VARCHAR (40) NOT NULL,
    Ctel VARCHAR (10) NOT NULL,
    PRIMARY KEY (Cid)
);

-- 把Cname欄位改為utf8碼
--ALTER TABLE `Customer` CHANGE `Cname` `Cname` VARCHAR(40) CHARACTER SET utf8 NOT NULL;

-- 創建資料表Transaction
create table Transaction (
    Tid INT NOT NULL AUTO_INCREMENT,
    Cid INT NOT NULL,
    Tprice INT NOT NULL,
    Ttime DateTime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (Tid)
);

--創建資料表Product
create table Product(
    Pid INT NOT NULL AUTO_INCREMENT,
    Pname VARCHAR(100) NOT NULL,
    Pimg1 BLOB NULL,
    Pimg2 BLOB NULL,
    Pimg3 BLOB NULL,
    Pimg4 BLOB NULL,
    Pimg5 BLOB NULL,
    Pimg6 BLOB NULL,
    Pimg7 BLOB NULL,
    Pimg8 BLOB NULL,
    Pprice INT NOT NULL,
    PRIMARY KEY (Pid)
);
--ALTER TABLE `Product` CHANGE `Pname` `Pname` VARCHAR(100) CHARACTER SET utf8 NOT NULL;

--創建資料表List
create table List(
    Lid INT NOT NULL AUTO_INCREMENT,
    Pid INT NOT NULL,
    Pname VARCHAR(100) NOT NULL,
    Lcount INT NOT NULL,
    Lprice INT NOT NULL, 
    Tid INT NOT NULL,
    PRIMARY KEY (Lid)
);
--ALTER TABLE `List` CHANGE `Pname` `Pname` VARCHAR(100) CHARACTER SET utf8 NOT NULL;


--亂數產資料
-- customer

delimiter $$
create procedure pro_cRand()
begin
declare cname VARCHAR (40) ;
declare ctel VARCHAR (10); 
declare j int DEFAULT 1;
    while j <= 1000 do
        select concat(generate_fname(),generate_lname()) into cname;
        set ctel = LPAD(floor(rand()*100000000),10,'09');
        insert into Customer (Cname, Ctel) values (cname,ctel);
        set j = j+1;
    end while;
end $$
delimiter ;

--transaction
delimiter $$
create procedure pro_tRand()
begin
    declare max_cid int;
    declare p_cid int;
    declare j int DEFAULT 1;

    while j <= 3000 do
        select max(Cid) from Customer into max_cid;
        set p_cid = floor(rand()*(max_cid)+1);
        insert into Transaction (Cid, Tprice) values (p_cid,floor(rand()*500+51));
        set j = j+1;
    end while;
end $$
delimiter ;
--