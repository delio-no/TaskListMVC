<body>
<div class="container">
    <h1 class="form__title">Task list</h1>
    <div>
        <form action="http://tasklistmvc/index.php?class=TaskList&mtd=addTask" method="post">
            <input class="form__input" name="work" type="text" placeholder="Enter text...">
            <button class="form__button" name="btnadd" type="submit">ADD</button>
        </form>
        <form action="http://tasklistmvc/index.php?class=TaskList&mtd=deleteAllTask" method="post">
            <button class="form__button" name="btnrmall" type="submit">REMOVE ALL</button>
        </form>
    </div>
    <br>
    <? foreach ($this->m->getDescriptionTaskList($_SESSION['id_user']) as $key => &$value) { ?>
        <? $idTask = $this->m->getIdTask($_SESSION['id_user']) ?>
        <? $statusTask = $this->m->getStatusTaskList($_SESSION['id_user']) ?>
        <div>
            <label class="form__label"><?= htmlspecialchars($value) ?></label>
            <br>
            <form action="http://tasklistmvc/index.php?class=TaskList&mtd=deleteTask" method="post">
            <button class="form__button" class="form__button" name="btnrm" type="submit" value="<?= $idTask[$key] ?>">
                DELETE
            </button>
            </form>
        </div>
        <form action="http://tasklistmvc/index.php?class=TaskList&mtd=statusReady" method="post">
        <button class="form__button" name="btnrd" type="submit" value="<?= $idTask[$key] ?>">
            READY
        </button>
        </form>
        <form action="http://tasklistmvc/index.php?class=TaskList&mtd=statusUnready" method="post">
        <button class="form__button" name="btnunrd" type="submit" value="<?= $idTask[$key] ?>">
            UNREADY
        </button>

        <label class="switch">
            <input type="checkbox" disabled <? echo htmlspecialchars($statusTask[$key]) ?> >
            <span class="slider round"></span>
        </label>
        </form>
        </form>
    <? }
    //для отладки
    //var_dump($_SESSION);
    ?>
</div>

</body>
</html>
