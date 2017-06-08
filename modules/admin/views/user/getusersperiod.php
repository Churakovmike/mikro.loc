<?php if ($countUsers != 0) : ?>
<h1>Отчет по новым абонентам</h1>
<div class="summary">
    Всего найдено <b><?= $countUsers ?></b> абонентов.
</div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Баланс</th>
            <th>Тариф</th>
            <th>Стоимость тарифа</th>
            <th>Статус</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($users as $user) : ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $user->surname ?></td>
            <td><?= $user->firstname ?></td>
            <td><?= $user->secondname ?></td>
            <td><?= $user->balance ?></td>
            <td><?= $user->tariffs->name ?></td>
            <td><?= $user->tariffs->cost ?></td>
            <?php
            if ( $user->activity == '0' ) {
                echo "<td><span class='label label-danger'>деактивирован</span></td>";
            }
            else {
                echo "<td><span class='label label-success'>активен</span></td>";
            }
            ?>
            <td><a class="btn btn-primary" href="/admin/user/view?id=<?= $user->id ?>">Перейти</a></td>

        </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else : ?>
<h2>По заданным параметрам не найдено абонентов</h2>
<?php endif; ?>
