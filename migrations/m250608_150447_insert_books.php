<?php


use yii\db\Migration;

/**
 * Class m230601_000000_insert_books_and_authors
 */
class m250608_150447_insert_books extends Migration
{
    public function safeUp()
    {

//        $this->createTable('{{%authors}}', [
//            'id' => $this->primaryKey(),
//            'full_name' => $this->string()->notNull(),
//        ]);
//        $this->createTable('{{%book_author}}', [
//            'book_id' => $this->integer()->notNull(),
//            'author_id' => $this->integer()->notNull(),
//            'PRIMARY KEY(book_id, author_id)',
//        ]);

        // Добавляем внешние ключи
//        $this->addForeignKey('fk_book_author_book', '{{%book_author}}', 'book_id', '{{%books}}', 'id', 'CASCADE', 'CASCADE');
//        $this->addForeignKey('fk_book_author_author', '{{%book_author}}', 'author_id', '{{%authors}}', 'id', 'CASCADE', 'CASCADE');

        $authors = [
            'Лев Толстой',
            'Фёдор Достоевский',
            'Александр Пушкин',
            'Михаил Булгаков',
            'Антон Чехов',
            'Николай Гоголь',
            'Иван Тургенев',
            'Владимир Набоков',
            'Александр Солженицын',
            'Борис Пастернак',
            'Джордж Оруэлл',
            'Джейн Остин',
            'Чарльз Диккенс',
            'Маргарет Этвуд',
            'Габриэль Гарсиа Маркес',
            'Харуки Мураками',
            'Стивен Кинг',
            'Дж. Р. Р. Толкин',
            'Джордж Р. Р. Мартин',
            'Айзек Азимов',
        ];

        $authorIds = [];
        foreach ($authors as $authorName) {
            $this->insert('{{%authors}}', ['full_name' => $authorName]);
            $authorIds[$authorName] = $this->db->getLastInsertID();
        }

        $books = [
            ['title' => 'Война и мир', 'authors' => ['Лев Толстой']],
            ['title' => 'Преступление и наказание', 'authors' => ['Фёдор Достоевский']],
            ['title' => 'Евгений Онегин', 'authors' => ['Александр Пушкин']],
            ['title' => 'Мастер и Маргарита', 'authors' => ['Михаил Булгаков']],
            ['title' => 'Вишнёвый сад', 'authors' => ['Антон Чехов']],
            ['title' => 'Мёртвые души', 'authors' => ['Николай Гоголь']],
            ['title' => 'Отцы и дети', 'authors' => ['Иван Тургенев']],
            ['title' => 'Лолита', 'authors' => ['Владимир Набоков']],
            ['title' => 'Архипелаг ГУЛАГ', 'authors' => ['Александр Солженицын']],
            ['title' => 'Доктор Живаго', 'authors' => ['Борис Пастернак']],
            ['title' => '1984', 'authors' => ['Джордж Оруэлл']],
            ['title' => 'Гордость и предубеждение', 'authors' => ['Джейн Остин']],
            ['title' => 'Оливер Твист', 'authors' => ['Чарльз Диккенс']],
            ['title' => 'Рассказ служанки', 'authors' => ['Маргарет Этвуд']],
            ['title' => 'Сто лет одиночества', 'authors' => ['Габриэль Гарсиа Маркес']],
            ['title' => 'Норвежский лес', 'authors' => ['Харуки Мураками']],
            ['title' => 'Оно', 'authors' => ['Стивен Кинг']],
            ['title' => 'Властелин колец', 'authors' => ['Дж. Р. Р. Толкин']],
            ['title' => 'Игра престолов', 'authors' => ['Джордж Р. Р. Мартин']],
            ['title' => 'Антология фантастики', 'authors' => ['Айзек Азимов', 'Джордж Р. Р. Мартин']],
            ['title' => 'Современная классика', 'authors' => ['Маргарет Этвуд', 'Харуки Мураками', 'Стивен Кинг']],
        ];

        foreach ($books as $book) {
            $this->insert('{{%books}}', ['title' => $book['title']]);
            $bookId = $this->db->getLastInsertID();

            foreach ($book['authors'] as $authorName) {
                $authorId = $authorIds[$authorName] ?? null;
                if ($authorId !== null) {
                    $this->insert('{{%book_author}}', [
                        'book_id' => $bookId,
                        'author_id' => $authorId,
                    ]);
                }
            }
        }
    }

    public function safeDown()
    {
        $this->dropTable('{{%book_author}}');
        $this->dropTable('{{%authors}}');
    }
}


