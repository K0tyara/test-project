<?php
/**
 * @var \App\Kernel\View\View $view
 * @var \App\Kernel\Session $session
 **/
?>
<?php $view->component('start'); ?>
<?php $view->component('navigation'); ?>


<?php if ($session->has('table_data') && !$session->get('table_data')['status']) { ?>
    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300"><?= $session->getFlash('table_data')['error'] ?></span>
<?php } ?>
<form action="/table/store" method="post" class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <input type="hidden" value="0" name="page">
    <input type="hidden" value="1000" name="limit">
    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center gap-4 pb-4 pt-4">
        <div class="relative max-w-sm">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
            </div>
            <input datepicker id="default-date_from" type="text" name="date_from" value="<?= date("d/m/Y")?>"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="From">
        </div>
        <div class="relative max-w-sm">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
            </div>
            <input datepicker id="date_to" type="text" name="date_to" value="<?=  date("d/m/Y"); ?>"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="To">
        </div>
        <button type="submit"
                class="py-2.5 px-5 ml-auto mr-5  text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            Show
        </button>

    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Id
            </th>
            <th scope="col" class="px-6 py-3">
                Email
            </th>
            <th scope="col" class="px-6 py-3">
                Status
            </th>
            <th scope="col" class="px-6 py-3">
                ftd
            </th>
        </tr>
        </thead>
        <tbody>
        <?php if ($session->has('table_data') && isset($session->get('table_data')['data'])) { ?>
            <?php foreach ($session->getFlash('table_data')['data'] as $item) { ?>
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <?= $item['id'] ?>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <?= $item['email'] ?>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <?= $item['status'] ?>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <?= $item['ftd'] ?>
                    </th>
                </tr>
            <?php } ?>
        <?php } ?>

        </tbody>
    </table>
</form>


<?php $view->component('end'); ?>
