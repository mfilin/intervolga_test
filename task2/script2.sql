/*
    есть товары без наличия
    есть склады без товаров

*/

-- найдем позиции без наличия
select
	p.id,
	p.title,
	sum(a.amount),
	count(stock_id) 
from products p 
	left join availabilities a on a.product_id = p.id 
group by
	p.id,
	p.title

-- Кабель питания HDMI, Сетевой фильтр


-- проставим наличие и отвезем на склад на Невском
INSERT INTO availabilities (amount, product_id, stock_id)
select
	1 as amount,
	p.id as product_id,
	2 as stock_id
from products p 
	left join availabilities a on a.product_id = p.id 
group by
	p.id,
	p.title
having 
	sum(a.amount) is null or count(stock_id) = 0
	
