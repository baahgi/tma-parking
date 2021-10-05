<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>TMA Parking</title>
</head>
<body>
    <div class="mt- md:ml-6 md:mt-0">
        <div id="checkoutprint" class="w-full max-w-lg mx-auto overflow-hidden bg-white rounded-lg shadow ">
            <div class="px-6 py-4">
                <div class="text-xl font-bold text-center text-gray-700">TMA PARKING</div>
                <div class="mt-1 text-sm text-center text-gray-600">Powered by Techmaaxx</div>

                    <div class="w-full mt-2">
                        <div class="flex justify-center">
                            <svg id="barcode"></svg>
                        </div>

                        <table class="min-w-full">
                            <thead class="bg-gray-100">
                            <tr>
                                <th class="px-3 py-1 text-xs font-medium leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="text-align: start">
                                    item
                                </th>
                                <th class="px-3 py-1 text-xs font-medium leading-4 tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                                    style="text-align: start">
                                    Data
                                </th>

                            </tr>
                            </thead>

                            <tbody class="bg-white">
                                    <tr>
                                        <td class="px-3 py-1 text-sm whitespace-no-wrap border-b border-gray-200">
                                            Vehicle number :
                                        </td>
                                        <td class="px-3 py-1 text-sm whitespace-no-wrap border-b border-gray-200">
                                            {{$parking->vehicle_no}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-3 py-1 text-sm whitespace-no-wrap border-b border-gray-200">
                                            Checkin :
                                        </td>
                                        <td class="px-3 py-1 text-sm whitespace-no-wrap border-b border-gray-200">
                                            {{$parking->checkin}}
                                        </td>
                                    </tr>

                            </tbody>
                        </table>
                    </div>

            </div>
        </div>

            <div class="flex justify-center mx-auto mt-4">
                <div class="text-center">
                    <p class="text-gray-500">--------------------------------------------</p>
                    <p class="text-xs">Thanks for working with TMA PArking</p>
                    <p class="text-xs">Please Don't  Temper with your receipt</p>
                    <p>--------------------------------------------</p>
                </div>
            </div>
    </div>


    <script src="{{ asset('js/JsBarcode.all.min.js') }}"></script>
    <script>
      var url = <?php echo json_encode($parking->consignmentno) ?>;
      JsBarcode("#barcode", url, {
        height: 60
      });

      window.print()
    </script>
</body>
</html>
