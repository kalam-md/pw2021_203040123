<?php

require '../../connections/functions.php';

$products = search($_GET['keyword']);


?>

<!-- Showing data -->
<table class="min-w-full divide-y divide-gray-200">
  <thead class="bg-gray-50">
    <tr>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Name
      </th>
      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Descriptions
      </th>
      <th scope="col" class="relative px-6 py-3">
        <span class="sr-only">Edit</span>
      </th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200">

    <!-- Jika data tidak ada -->
    <?php if (empty($products)) : ?>
      <tr>
        <td class="px-6 py-4 whitespace-nowrap" colspan="3">
          <div class="flex items-center justify-center">
            <p class="text-sm font-medium text-gray-900">Tidak ada data</p>
          </div>
        </td>
      </tr>
    <?php endif; ?>

    <!-- Jika data ada -->
    <?php foreach ($products as $product) : ?>
      <?php if (isset($product['id'])) : ?>
        <tr>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex-shrink-0 h-10 w-10">
                <img class="h-10 w-10 rounded-full" src="../../assets/img/<?= $product['pictures']; ?>">
              </div>
              <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">
                  <?= $product['names']; ?>
                </div>
                <div class="text-sm text-gray-500">
                  <?= $product['brands']; ?>
                </div>
              </div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900"><?= mb_strimwidth($product['descriptions'], 0, 60, "..."); ?></div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <a href="crud/detail.php?id=<?= $product['id'] ?>">
              <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm sm:text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                </svg>
                Detail
              </button>
            </a>
          </td>
        </tr>
      <?php endif; ?>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- pagination -->
<!-- <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
  <div class="flex-1 flex justify-between sm:hidden">
    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500">
      Previous
    </a>
    <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-gray-500">
      Next
    </a>
  </div>
  <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
    <div>
      <p class="text-sm text-gray-700">
        Showing
        <span class="font-medium">1</span>
        to
        <span class="font-medium">10</span>
        of
        <span class="font-medium">97</span>
        results
      </p>
    </div>
    <div>
      <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">

        <?php if ($halamanAktif > 1) : ?>
          <a href="?page=<?= $halamanAktif - 1; ?>" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
            <span class="sr-only">Previous</span>
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
          </a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
          <?php if ($i == $halamanAktif) : ?>
            <a href="?page=<?= $i; ?>" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
              <?= $i; ?>
            </a>
          <?php else : ?>
            <a href="?page=<?= $i; ?>" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
              <?= $i; ?>
            </a>
          <?php endif; ?>
        <?php endfor; ?>

        <?php if ($halamanAktif < $jumlahHalaman) : ?>
          <a href="?page=<?= $halamanAktif + 1; ?>" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
            <span class="sr-only">Next</span>
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
          </a>
        <?php endif; ?>
      </nav>
    </div>
  </div>
</div> -->