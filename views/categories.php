<div class="container flex flex-justify-center flex-align-center" style="min-height:85vh;">
    <div class="col-4 col-sm-12 m-2">
        <h2 class="mt-2 mb-5 light text-center">Dodawanie Kategorii</h2>
        <form class="col-12 flex flex-col" name="add_category" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <input type="text" class="input" placeholder="Nazwa Kategorii">
            <input type="submit" value="Dodaj" class="mt-4 btn bg-primary white">
        </form>
    </div>
    <div class="col-4 col-sm-12 m-2">
        <h2 class="mt-2 mb-5 light text-center">Edycja Kategorii</h2>
         <form class="col-12 flex flex-col" name="edit_category" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <input type="text" class="input" placeholder="Nazwa Kategorii">
            <input type="submit" value="Dodaj" class="mt-4 btn bg-primary white">
        </form>
    </div>
    <div class="col-4 col-sm-12 m-2">
        <h2 class="mt-2 mb-5 light text-center">Usuwanie kategorii</h2>
         <form class="col-12 flex flex-col" name="add_category" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
           select
            <input type="text" class="input" placeholder="Nazwa Kategorii">
            <input type="submit" value="Dodaj" class="mt-4 btn bg-primary white">
        </form>    
    </div>
</div>