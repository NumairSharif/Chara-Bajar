CREATE DATABASE IF NOT EXISTS charabazar;

CREATE TABLE customers (CUSTOMER_ID int(10) NOT NULL AUTO_INCREMENT, CUSTOMER_NAME varchar(30) NOT NULL, EMAIL varchar(30) NOT NULL, PHONE int(11) NOT NULL, LOCATION varchar(20), PASS varchar(20) NOT NULL, PRIMARY KEY (CUSTOMER_ID));

CREATE TABLE employees (EMPLOYEE_ID int(10) NOT NULL AUTO_INCREMENT, EMPLOYEE_NAME varchar(30) NOT NULL, EMPLOYEE_PHONE int(11) NOT NULL, EMAIL varchar(30) NOT NULL, DATE_OF_BIRTH date NOT NULL, SALARY int(10) NOT NULL, JOIN_DATE date NOT NULL, END_DATE date NOT NULL, PRIMARY KEY (EMPLOYEE_ID));

CREATE TABLE orders (ORDER_ID int(10) NOT NULL AUTO_INCREMENT, ORDER_DATE date NOT NULL, PRICE int(10) NOT NULL, QUANTITY int(10) NOT NULL, PAYMENT_TYPE varchar(20) NOT NULL, PAYMENT_STATUS varchar(10) NOT NULL, PAYMENT_DATE date NOT NULL, TRANSITION_NO int(10) NOT NULL, EMPLOYEE_ID int(10) NOT NULL, CUSTOMER_ID int(10) NOT NULL, PRODUCT_ID int(10) NOT NULL, PRIMARY KEY (ORDER_ID));

CREATE TABLE products (PRODUCT_ID int(10) NOT NULL AUTO_INCREMENT, PRODUCT_NAME varchar(20) NOT NULL, QUANTITY int(10) NOT NULL, PRICE int(10) NOT NULL, PRODUCT_TYPE varchar(30) NOT NULL, ADDITION_DATE date NOT NULL, SOIL_RECOMMENDATION varchar(3000) NOT NULL, FERTILIZER_RECOMMENDATION varchar(3000) NOT NULL, IMAGE VARCHAR(1000), PRIMARY KEY (PRODUCT_ID));

ALTER TABLE orders ADD INDEX FKorders724408 (EMPLOYEE_ID), ADD CONSTRAINT FKorders724408 FOREIGN KEY (EMPLOYEE_ID) REFERENCES employees (EMPLOYEE_ID);

ALTER TABLE orders ADD INDEX FKorders653766 (CUSTOMER_ID), ADD CONSTRAINT FKorders653766 FOREIGN KEY (CUSTOMER_ID) REFERENCES customers (CUSTOMER_ID);

ALTER TABLE orders ADD INDEX FKorders237064 (PRODUCT_ID), ADD CONSTRAINT FKorders237064 FOREIGN KEY (PRODUCT_ID) REFERENCES products (PRODUCT_ID);

ALTER TABLE customers
ADD COLUMN CUSTOMER_IMAGE VARCHAR(1000);

INSERT INTO customers
VALUES (1000,'rashed','rashed@abc.com',01675875019,'dhaka','1234',"image/1.jpg"),
(1001,'shafat','shafat@abc.com',01675875018,'dhaka','2345',"image/2.jpg");

INSERT INTO products
VALUES (1000,'Mango',10,500,'plant',CURDATE(),'Depending on the variety of mango, the tree can reach up to 90 feet, or less in areas outside of the tropics. Most deep, well-drained soils will support a mango tree, but they do not like heavy, wet soils. A soil pH of 5.5 to 7.5 is best. Fertilize your mango regularly with a nitrogen-rich fertilizer and periodically add iron.','mango peel are to be composted  a hot composting system is recommended using fresh cow dung (3:1 ratio) and 2.5% Urea. Dissolved in water.
compost may need soaking when turned to  moisture level of about 50%.
','image/mango_1.jpg'),
(1001,'jackfruit',5,300,'plant',CURDATE(),'The jack tree is well-suited to tropical lowlands, and it bears the largest fruit of all trees; reaching as much as 55 kg (120 lb) in weight, 90 cm (35 in) in length, and 50 cm (20 in) in diameter.[10] Jackfruit tree can’t tolerate frost and drought, even so, it is a tough tree that can withstand severe temperatures. A mature tree can bear up to 118 F heat and if acclimated, about 32 F cold temperature for a short time. Some jackfruit varieties can reach up to 100 feet, and there are some dwarf varieties like black gold that restrict up to only 10 – 20 feet height.','Fertilize your growing jackfruit tree with nitrogen, phosphorus, potassium, and magnesium applied in a ratio of 8:4:2:1 to 30 grams per tree at six months of age and doubling every six months up to two years of age. Past the two year mark, growing jackfruit trees should get 1 kg. per tree in the amount of 4:2:4:1 and is applied before and at the end of the wet season.','image/jackfruit_1.jpg'),
(1002,'dragon fruit',6,1000,'plant',CURDATE(),'This plant is able to grow in any soil that is well draining, but it prefers to grow in soil that is slightly acidic with a pH level that is between 6-7. Sandy soil is the best option for this plant; if it is not available, just ensure that it is well draining soil.',"fertilizers such as aged manure or compost. For newly planted dragon fruit, don't apply fertilizer during the first month. Then apply 4 ounces of a fertilizer such as 6-6-6 or 8-3-9 (nitrogen, phosphorus and potassium).every two months from the time growth starts in early spring to early fall, when growth stops for the winter. Scatter the fertilizer evenly around the plant, from about 3 inches away from the stem to about 12 inches away from the plant.",'image/dragon_1.jpg');

INSERT INTO employees(EMPLOYEE_NAME,EMPLOYEE_PHONE,EMAIL,DATE_OF_BIRTH,SALARY,JOIN_DATE)
VALUES ('mreedul',0192,'mreedul@abc.com','2000-01-01',15000,'2019-01-01');



