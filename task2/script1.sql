/*
    есть пустые группы (без товаров)
    варианты решения:
    1)  создать такие товары с привязкой к нужным группам
    2)  создать новую таблицу, где определить связь многие-ко-многим и проставить записи для товаров.
        Таким образом один товар будет относиться к разным группам, что расширит функции БД

    Делаем п.2
*/

-- создать новую таблицу
CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- забрать в новую таблицу прежние значения связок
insert into product_category (product_id, category_id)
select p.id, p.category_id from products p

-- найти пустые категории по старой схеме
select
	c.id,
	c.title,
	count(p.id) 
from categories c 
	left join products p
on c.id = p.category_id 
group by
	c.id,
	c.title

-- Аксессуары мебель Товары для дачи. Проставим для них связки
insert into product_category (product_id, category_id) VALUES
    (9, 5), -- Кабель питания HDMI в Аксессуары
    (6, 9), -- Кухонная вытяжка Elica в мебель
    (1, 10) -- а телевизор мы отвезем на дачу :)

-- запрос для товары-категории немного видоизменится
select
	c.id,
	c.title,
	count(pc.id) 
from categories c 
	left join product_category pc on pc.category_id = c.id 
group by
	c.id,
	c.title

-- из таблицы Товаров можно убрать столбец привязки TODO

