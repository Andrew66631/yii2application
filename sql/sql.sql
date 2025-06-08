#1

select  b.title,count(ba.author_id) cnt, group_concat(DISTINCT a.full_name,',')
from books b left join book_author ba on b.id=ba.book_id left join authors a on ba.author_id = a.id
group by b.id
order by cnt asc;

#2
select b.title,query.cnt,query.authors
from books b left join (
    select ba.book_id,count(ba.author_id) cnt,group_concat(DISTINCT authors.full_name,',') authors from book_author ba left join authors on ba.author_id = authors.id
    group by ba.book_id) query on query.book_id=b.id
order by query.cnt asc;