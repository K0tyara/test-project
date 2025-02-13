<?php
/**
 * @var \App\Kernel\View\View $view
 * @var \App\Kernel\Session $session
 **/
?>
<?php $view->component('start'); ?>
<?php $view->component('navigation'); ?>


<div class="flex justify-center items-center h-100">
    <form action="/form/store" method="post" class="max-w-sm mx-auto w-100">
        <input type="hidden" value="28" name="box_id">
        <input type="hidden" value="5" name="offer_id">
        <input type="hidden" value="GB" name="countryCode">
        <input type="hidden" value="en" name="language">
        <input type="hidden" value="qwerty12" name="password">
        <div class="mb-5">
            <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                name</label>
            <input type="text" id="firstname" name="firstName"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="Jon" required/>
            <?php if ($session->has('firstname')) { ?>
                <?php foreach ($session->getFlash('firstname') as $error) { ?>
                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300"><?= $error ?></span>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="mb-5">
            <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
            <input type="text" id="lastname" name="lastName"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="Smit"
            />
            <?php if ($session->has('lastname')) { ?>
                <?php foreach ($session->getFlash('lastname') as $error) { ?>
                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300"><?= $error ?></span>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="mb-5">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
            <input type="tel" id="phone" name="phone"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            />
            <?php if ($session->has('phone')) { ?>
                <?php foreach ($session->getFlash('phone') as $error) { ?>
                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300"><?= $error ?></span>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" id="email" name="email"
                   class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                   placeholder="name@mail.com" required/>
            <?php if ($session->has('email')) { ?>
                <?php foreach ($session->getFlash('email') as $error) { ?>
                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300"><?= $error ?></span>
                <?php } ?>
            <?php } ?>
        </div>

        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Submit
        </button>
    </form>
</div>
<div class="p-2 m-2" style="color: white">
    <?php if ($session->has('add_lead_response')) { ?>
        <pre style="text-wrap: inherit;"><?= json_encode($session->getFlash('add_lead_response')) ?></pre>
    <?php } ?>

</div>

<?php $view->component('end'); ?>
