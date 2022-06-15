<body>
<div class="container">
    <h1 class="form__title">Task list</h1>
    <div>
        <form action="" method="post">
            <input class="form__input" name="work" type="text" placeholder="Enter text...">
            <button class="form__button" name="btnadd" type="submit">ADD</button>
            <button class="form__button" name="btnrmall" type="submit">REMOVE ALL</button>
    </div>
    <br>
    <? foreach ($this->db->getDescriptionTaskList($_SESSION['id_user']) as $key => &$value) { ?>
        <? $idTask = $this->db->getIdTask($_SESSION['id_user']) ?>
        <? $statusTask = $this->db->getStatusTaskList($_SESSION['id_user']) ?>
        <div>
            <label class="form__label"><?= htmlspecialchars($value) ?></label>
            <br>
            <button class="form__button" class="form__button" name="btnrm" type="submit" value="<?= $idTask[$key] ?>">
                DELETE
            </button>
        </div>
        <button class="form__button" name="btnrd" type="submit" value="<?= $idTask[$key] ?>">
            READY
        </button>
        <button class="form__button" name="btnunrd" type="submit" value="<?= $idTask[$key] ?>">
            UNREADY
        </button>
        <label class="switch">
            <input type="checkbox" disabled <? echo htmlspecialchars($statusTask[$key]) ?> >
            <span class="slider round"></span>
        </label>
        </form>
    <? }
    //для отладки
    //var_dump($_SESSION);
    ?>
</div>

</body>
</html>
