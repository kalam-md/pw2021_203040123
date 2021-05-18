<?php

session_start();

if (!isset($_SESSION['login'])) {
  header("Location: ../auth/login.php");
  exit;
}

require '../../connections/functions.php';

if (!isset($_GET['id'])) {
  header("Location: ../dashboard.php");
  exit;
}

$id = $_GET['id'];

$product = query("SELECT * FROM products WHERE id = $id");

if (isset($_POST['edit'])) {
  if (edit($_POST) > 0) {
    echo "<script>
            alert('Data berhasil diedit');
            document.location.href = '../dashboard.php';
         </script>";
  } else {
    echo "Data gagal diedit!";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tubes 203040123 | Edit products</title>

  <link rel="stylesheet" href="../../../css/dist.css">
</head>

<body class="bg-gray-100">

  <div>
    <!-- navbar -->
    <nav class="bg-gray-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <!-- <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow"> -->
              <h2 class="tracking-widest text-gray-300 rounded-md text-lg font-medium">203040123</h2>
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="../dashboard.php" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>

                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Profile</a>

                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Reports</a>
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              <!-- Profile dropdown -->
              <div class="ml-3 relative">
                <div>
                  <a href="../auth/logout.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Logout</a>
                </div>
              </div>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button type="button" id="mobile-menu-button" class="mobile-menu-button bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
              <span class="sr-only">Open main menu</span>
              <!--
              Heroicon name: outline/menu

              Menu open: "hidden", Menu closed: "block"
            -->
              <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
              <!--
              Heroicon name: outline/x

              Menu open: "block", Menu closed: "hidden"
            -->
              <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Mobile menu, show/hide based on menu state. -->
      <div class="md:hidden mobile-menu" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
          <a href="../dashboard.php" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>

          <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Profile</a>

          <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Reports</a>

          <a href="../auth/logout.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Logout</a>
        </div>
      </div>
    </nav>

    <!-- header -->
    <header class="bg-gray-50 shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">
          Edit product
        </h1>
      </div>
    </header>

    <!-- Main content -->
    <main class="mt-10 lg:px-5 md:px-5">
      <div class="mt-10 sm:mt-0 mb-10 flex justify-center">
        <div class="w-9/12">
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $product['id']; ?>">
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="names" class="block text-sm font-medium text-gray-700">Name of product</label>
                      <input type="text" name="names" id="names" autocomplete="off" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="<?= $product['names']; ?>">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="brands" class="block text-sm font-medium text-gray-700">Brand</label>
                      <input type="text" name="brands" id="brands" autocomplete="off" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="<?= $product['brands']; ?>">
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                      <label for="descriptions" class="block text-sm font-medium text-gray-700">Description</label>
                      <div class="mt-1">
                        <textarea id="descriptions" name="descriptions" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"><?= $product['descriptions']; ?></textarea>
                      </div>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="categories" class="block text-sm font-medium text-gray-700">Category</label>
                      <select id="categories" name="categories" autocomplete="off" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Shirt</option>
                        <option>Long Shirt</option>
                        <option>Flannel</option>
                        <option>Shoes</option>
                        <option>Pants</option>
                        <option>Clothes</option>
                        <option>Sandals</option>
                      </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="prices" class="block text-sm font-medium text-gray-700">Price</label>
                      <input type="number" name="prices" id="prices" autocomplete="off" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="<?= $product['prices']; ?>">
                    </div>

                    <!-- <div class="col-span-6 sm:col-span-6">
                      <label class="block text-sm font-medium text-gray-700">
                        Picture
                      </label>
                      <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                          <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                          <div class="flex text-sm text-gray-600">
                            <label for="pictures" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                              <span>Upload a file</span>
                              <input id="pictures" name="pictures" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                          </div>
                          <p class="text-xs text-gray-500">
                            PNG, JPG, OR JPEG
                          </p>
                        </div>
                      </div>
                    </div> -->

                    <div class="col-span-6 sm:col-span-3">
                      <img src="../../../assets/img/<?= $product['pictures']; ?>" class="img-preview rounded">
                      <label for="pictures" class="block text-sm font-medium text-gray-700">Picture</label>
                      <input type="hidden" name="gambar_lama" value="<?= $product['pictures']; ?>">
                      <input type="file" name="pictures" id="pictures" autocomplete="off" class="gambar mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" onchange="previewImage()">
                    </div>
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  <button type="submit" name="edit" class="mb-3 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z" />
                    </svg>
                    Save
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
  </div>

  <!-- javasxript -->
  <script src="../../../js/styles.js"></script>
</body>

</html>