<?php

use yii\db\Migration;

/**
 * Class m240117_220402_add_fixture_data
 */
class m240117_220402_add_fixture_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%country}}', ['id', 'full_name'], [
            [1, 'Россия'],
            [2, 'США'],
            [3, 'Канада'],
            [4, 'Китай'],
            [5, 'Индия'],
            [6, 'Бразилия'],
            [7, 'Япония'],
            [8, 'Германия'],
            [9, 'Франция'],
            [10, 'Великобритания'],
        ]);

        $this->batchInsert('{{%genre}}', ['id', 'full_name'], [
            [1, 'Драма'],
            [2, 'Комедия'],
            [3, 'Триллер'],
            [4, 'Фантастика'],
            [5, 'Ужасы'],
            [6, 'Криминал'],
            [7, 'Фэнтези'],
            [8, 'Документальный'],
            [9, 'Романтика'],
            [10, 'Анимация'],
        ]);

        $this->batchInsert('{{%director}}', ['id', 'full_name'], [
            [1, 'Андрей Звягинцев'],
            [2, 'Стивен Спилберг'],
            [3, 'Чжан Имоу'],
            [4, 'Ашутош Говарикер'],
            [5, 'Фернанду Мейреллиш'],
            [6, 'Хаяо Миядзаки'],
            [7, 'Вим Вендерс'],
            [8, 'Люк Бессон'],
            [9, 'Кристофер Нолан'],
            [10, 'Дени Вильнёв'],
        ]);

        $this->batchInsert('{{%actor}}', ['id', 'full_name'], [
            [1, 'Бенедикт Камбербэтч'],
            [2, 'Мартин Фриман'],
            [3, 'Урсула Корберо'],
            [4, 'Альваро Морте'],
            [5, 'Сатору Мацуока'],
            [6, 'Юсукэ Ямамото'],
            [7, 'Яред Хиллерс'],
            [8, 'Стеллан Скарсгард'],
            [9, 'Жоао Мигуэль'],
            [10, 'Бианка Комприни'],
            [11, 'Ли Байон'],
            [12, 'Шин Ха-гён'],
            [13, 'Эль Фаннинг'],
            [14, 'Николай Костер-Вальдау'],
            [15, 'Аамир Кхан'],
            [16, 'Грейм Смит'],
            [17, 'Ли Чжэнь'],
            [18, 'Янь Шуй'],
            [19, 'Сара Полсон'],
            [20, 'Эван Питерс'],
        ]);

        $this->batchInsert('{{%user}}', ['id', 'name', 'mail', 'password', 'role'], [
            [1, 'John Doe', 'john.doe@example.com', 'securepass1', 'user'],
            [2, 'Jane Smith', 'jane.smith@example.com', 'strongpass2', 'user'],
            [3, 'Bob Johnson', 'bob.johnson@example.com', 'password123', 'user'],
            [4, 'Alice Brown', 'alice.brown@example.com', 'pass1234', 'user'],
            [5, 'Charlie Davis', 'charlie.davis@example.com', 'testpass', 'user'],
            [6, 'Eva White', 'eva.white@example.com', 'secure123', 'user'],
            [7, 'David Lee', 'david.lee@example.com', 'userpass', 'user'],
            [8, 'Olivia Wilson', 'olivia.wilson@example.com', 'password456', 'user'],
            [9, 'Samuel Miller', 'samuel.miller@example.com', 'testpass789', 'user'],
            [10, 'Grace Taylor', 'grace.taylor@example.com', 'adminpass', 'admin'],
        ]);

        $this->batchInsert('{{%post}}', ['id', 'name', 'season', 'series', 'description', 'photo', 'author_id', 'date', 'date_created'], [
            [1, 'Игра престолов', 1, 1, '"Игра престолов" основана на серии романов "Песнь Льда и Огня" Джорджа Р. Р. Мартина. Сюжет развивается в вымышленном мире Вестерос, где несколько влиятельных домов борются за власть и Железный Трон. По мере того как интриги раскрываются, всплывают темы политики, предательства, магии и долгожданной зимы.', null, 10, date_create('2024-01-16')->format('Y-m-d'), date_create('2024-01-15 12:23:02')->format('Y-m-d H:i:s')],
            [2, 'Черное зеркало', 1, 1, '"Черное зеркало" - это британский антологический сериал, созданный Чарли Брукером. Каждый эпизод представляет собой отдельную историю, исследующую темы технологии, общества и человеческой природы. Сериал часто представляет возможные темные сценарии будущего, связанные с использованием современных и будущих технологий. Он вызывает задумчивость и часто подчеркивает тонкую грань между прогрессом и потенциальными негативными последствиями.', null, 10, date_create('2024-01-16')->format('Y-m-d'), date_create('2024-01-15 13:23:02')->format('Y-m-d H:i:s')],
        ]);

        $this->batchInsert('{{%post_country}}', ['post_id', 'country_id'], [
            [1, 2],
            [2, 10],
        ]);

        $this->batchInsert('{{%post_genre}}', ['post_id', 'genre_id'], [
            [1, 7],
            [2, 4],
            [1, 1],
            [2, 3],
            [2, 1],
        ]);

        $this->batchInsert('{{%post_director}}', ['post_id', 'director_id'], [
            [1, 2],
            [2, 9],
        ]);

        $this->batchInsert('{{%post_actor}}', ['post_id', 'actor_id'], [
            [1, 19],
            [2, 1],
            [1, 20],
            [2, 2],
        ]);

        $this->batchInsert('{{%comment}}', ['id', 'text', 'post_id', 'author_id', 'date_created', 'date'], [
            [1, 'Найс', null, 1, date_create('2024-01-18 13:23:02')->format('Y-m-d H:i:s'), date_create('2024-01-17')->format('Y-m-d')],
            [2, 'Супер найс', null, 2, date_create('2024-01-18 13:23:02')->format('Y-m-d H:i:s'), date_create('2024-01-17')->format('Y-m-d')],
            [3, 'Коммент3', 1, 3, date_create('2024-01-18 13:23:02')->format('Y-m-d H:i:s'), date_create('2024-01-16')->format('Y-m-d')],
            [4, 'Коммент4', 2, 4, date_create('2024-01-18 13:23:02')->format('Y-m-d H:i:s'), date_create('2024-01-16')->format('Y-m-d')],
        ]);

        $this->batchInsert('{{%review}}', ['id', 'text', 'post_id', 'author_id', 'date_created', 'date', 'rating'], [
            [1, 'мне тоже... оиии', 1, 5, date_create('2024-01-18 13:23:02')->format('Y-m-d H:i:s'), date_create('2024-01-16')->format('Y-m-d'), 1],
            [2, 'мне понравилось', 2, 6, date_create('2024-01-18 13:23:02')->format('Y-m-d H:i:s'), date_create('2024-01-16')->format('Y-m-d'), 1],
            [3, 'а мне неоч', 1, 7, date_create('2024-01-18 13:23:02')->format('Y-m-d H:i:s'), date_create('2024-01-16')->format('Y-m-d'), 0],
            [4, 'я вобще админ', 2, 10, date_create('2024-01-18 13:23:02')->format('Y-m-d H:i:s'), date_create('2024-01-16')->format('Y-m-d'), 0],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%coutry}}');
        $this->delete('{{%genre}}');
        $this->delete('{{%director}}');
        $this->delete('{{%actor}}');
        $this->delete('{{%user}}');
        $this->delete('{{%post}}');
        $this->delete('{{%comment}}');
        $this->delete('{{%review}}');
        $this->delete('{{%post_country}}');
        $this->delete('{{%post_genre}}');
        $this->delete('{{%post_director}}');
        $this->delete('{{%post_actor}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240117_220402_add_fixture_data cannot be reverted.\n";

        return false;
    }
    */
}
