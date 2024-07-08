<?php
    session_start();
    include_once '../inc/header.php'; 
?>
<div class="container-fluid">
    <div class="col-md-12">
        <h1 class="h3 mb-4 text-gray-800">API Dokumentasi</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">API URL</h6>
            </div>
            <div class="card-body">
                <p><code>https://skripsi-salim.s34l.my.id/admin/api.php</code></p>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">GET Parameters</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Parameter</th>
                            <th scope="col">Type</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>key</code></td>
                            <td>string</td>
                            <td>Use key: <b><?=$_SESSION['username'];?></b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Example Request</h6>
            </div>
            <div class="card-body">
                <p><code>https://skripsi-salim.s34l.my.id/admin/api.php?key=YOUR_API_KEY</code></p>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Response</h6>
            </div>
            <div class="card-body">
                <p>The API will return a JSON object. An example response is shown below:</p>
                <pre><code>
                	{
                        "evaluation_matrix": [
                            {
                                "no": 1,
                                "alternatif": "A1",
                                "nama": "Pop Corn East Bali Cashew",
                                "criteria": {
                                    "Biaya": "4",
                                    "Stok": "2",
                                    "Terjual": "5",
                                    "Gudang": "4",
                                    "Rating": "4"
                                }
                            },
                            {
                                "no": 2,
                                "alternatif": "A2",
                                "nama": "Soaci (Seblak Baso Aci)",
                                "criteria": {
                                    "Biaya": "4",
                                    "Stok": "3",
                                    "Terjual": "4",
                                    "Gudang": "4",
                                    "Rating": "4"
                                }
                            },
                            {
                                "no": 3,
                                "alternatif": "A3",
                                "nama": "Kering Kentang Mustofa",
                                "criteria": {
                                    "Biaya": "4",
                                    "Stok": "3",
                                    "Terjual": "3",
                                    "Gudang": "4",
                                    "Rating": "5"
                                }
                            },
                            {
                                "no": 4,
                                "alternatif": "A4",
                                "nama": "Sambal Jawara Selera (20)",
                                "criteria": {
                                    "Biaya": "4",
                                    "Stok": "3",
                                    "Terjual": "3",
                                    "Gudang": "4",
                                    "Rating": "5"
                                }
                            },
                            {
                                "no": 5,
                                "alternatif": "A5",
                                "nama": "Teh Dedew Bacil Ori \/ Bacil Geprek",
                                "criteria": {
                                    "Biaya": "4",
                                    "Stok": "3",
                                    "Terjual": "3",
                                    "Gudang": "4",
                                    "Rating": "4"
                                }
                            },
                            {
                                "no": 6,
                                "alternatif": "A6",
                                "nama": "Siengkong",
                                "criteria": {
                                    "Biaya": "4",
                                    "Stok": "3",
                                    "Terjual": "3",
                                    "Gudang": "4",
                                    "Rating": "3"
                                }
                            },
                            {
                                "no": 7,
                                "alternatif": "A7",
                                "nama": "BOCI Baso Aci",
                                "criteria": {
                                    "Biaya": "4",
                                    "Stok": "2",
                                    "Terjual": "3",
                                    "Gudang": "4",
                                    "Rating": "5"
                                }
                            },
                            {
                                "no": 8,
                                "alternatif": "A8",
                                "nama": "Abon Sapi Malioboro",
                                "criteria": {
                                    "Biaya": "4",
                                    "Stok": "3",
                                    "Terjual": "3",
                                    "Gudang": "4",
                                    "Rating": "4"
                                }
                            },
                            {
                                "no": 9,
                                "alternatif": "A9",
                                "nama": "Kripik Usus dan Ceker",
                                "criteria": {
                                    "Biaya": "4",
                                    "Stok": "4",
                                    "Terjual": "2",
                                    "Gudang": "4",
                                    "Rating": "3"
                                }
                            },
                            {
                                "no": 10,
                                "alternatif": "A10",
                                "nama": "Rosella Tea East Bali Cashew",
                                "criteria": {
                                    "Biaya": "4",
                                    "Stok": "3",
                                    "Terjual": "2",
                                    "Gudang": "4",
                                    "Rating": "3"
                                }
                            }
                        ],
                        "normalized_performance_ratings": [
                            {
                                "no": 1,
                                "alternatif": "A1",
                                "nama": "Pop Corn East Bali Cashew",
                                "criteria": {
                                    "Biaya": 0.3162,
                                    "Stok": 0.2144,
                                    "Terjual": 0.4927,
                                    "Gudang": 0.3162,
                                    "Rating": 0.3105
                                }
                            },
                            {
                                "no": 2,
                                "alternatif": "A2",
                                "nama": "Soaci (Seblak Baso Aci)",
                                "criteria": {
                                    "Biaya": 0.3162,
                                    "Stok": 0.3216,
                                    "Terjual": 0.3941,
                                    "Gudang": 0.3162,
                                    "Rating": 0.3105
                                }
                            },
                            {
                                "no": 3,
                                "alternatif": "A3",
                                "nama": "Kering Kentang Mustofa",
                                "criteria": {
                                    "Biaya": 0.3162,
                                    "Stok": 0.3216,
                                    "Terjual": 0.2956,
                                    "Gudang": 0.3162,
                                    "Rating": 0.3881
                                }
                            },
                            {
                                "no": 4,
                                "alternatif": "A4",
                                "nama": "Sambal Jawara Selera (20)",
                                "criteria": {
                                    "Biaya": 0.3162,
                                    "Stok": 0.3216,
                                    "Terjual": 0.2956,
                                    "Gudang": 0.3162,
                                    "Rating": 0.3881
                                }
                            },
                            {
                                "no": 5,
                                "alternatif": "A5",
                                "nama": "Teh Dedew Bacil Ori \/ Bacil Geprek",
                                "criteria": {
                                    "Biaya": 0.3162,
                                    "Stok": 0.3216,
                                    "Terjual": 0.2956,
                                    "Gudang": 0.3162,
                                    "Rating": 0.3105
                                }
                            },
                            {
                                "no": 6,
                                "alternatif": "A6",
                                "nama": "Siengkong",
                                "criteria": {
                                    "Biaya": 0.3162,
                                    "Stok": 0.3216,
                                    "Terjual": 0.2956,
                                    "Gudang": 0.3162,
                                    "Rating": 0.2328
                                }
                            },
                            {
                                "no": 7,
                                "alternatif": "A7",
                                "nama": "BOCI Baso Aci",
                                "criteria": {
                                    "Biaya": 0.3162,
                                    "Stok": 0.2144,
                                    "Terjual": 0.2956,
                                    "Gudang": 0.3162,
                                    "Rating": 0.3881
                                }
                            },
                            {
                                "no": 8,
                                "alternatif": "A8",
                                "nama": "Abon Sapi Malioboro",
                                "criteria": {
                                    "Biaya": 0.3162,
                                    "Stok": 0.3216,
                                    "Terjual": 0.2956,
                                    "Gudang": 0.3162,
                                    "Rating": 0.3105
                                }
                            },
                            {
                                "no": 9,
                                "alternatif": "A9",
                                "nama": "Kripik Usus dan Ceker",
                                "criteria": {
                                    "Biaya": 0.3162,
                                    "Stok": 0.4288,
                                    "Terjual": 0.1971,
                                    "Gudang": 0.3162,
                                    "Rating": 0.2328
                                }
                            },
                            {
                                "no": 10,
                                "alternatif": "A10",
                                "nama": "Rosella Tea East Bali Cashew",
                                "criteria": {
                                    "Biaya": 0.3162,
                                    "Stok": 0.3216,
                                    "Terjual": 0.1971,
                                    "Gudang": 0.3162,
                                    "Rating": 0.2328
                                }
                            }
                        ],
                        "weighted_normalized_ratings": [
                            {
                                "no": 1,
                                "alternatif": "A1",
                                "nama": "Pop Corn East Bali Cashew",
                                "criteria": {
                                    "Biaya": 1.581,
                                    "Stok": 0.6432,
                                    "Terjual": 1.4781,
                                    "Gudang": 1.2648,
                                    "Rating": 1.5525
                                }
                            },
                            {
                                "no": 2,
                                "alternatif": "A2",
                                "nama": "Soaci (Seblak Baso Aci)",
                                "criteria": {
                                    "Biaya": 1.581,
                                    "Stok": 0.9648,
                                    "Terjual": 1.1823000000000001,
                                    "Gudang": 1.2648,
                                    "Rating": 1.5525
                                }
                            },
                            {
                                "no": 3,
                                "alternatif": "A3",
                                "nama": "Kering Kentang Mustofa",
                                "criteria": {
                                    "Biaya": 1.581,
                                    "Stok": 0.9648,
                                    "Terjual": 0.8867999999999999,
                                    "Gudang": 1.2648,
                                    "Rating": 1.9405000000000001
                                }
                            },
                            {
                                "no": 4,
                                "alternatif": "A4",
                                "nama": "Sambal Jawara Selera (20)",
                                "criteria": {
                                    "Biaya": 1.581,
                                    "Stok": 0.9648,
                                    "Terjual": 0.8867999999999999,
                                    "Gudang": 1.2648,
                                    "Rating": 1.9405000000000001
                                }
                            },
                            {
                                "no": 5,
                                "alternatif": "A5",
                                "nama": "Teh Dedew Bacil Ori \/ Bacil Geprek",
                                "criteria": {
                                    "Biaya": 1.581,
                                    "Stok": 0.9648,
                                    "Terjual": 0.8867999999999999,
                                    "Gudang": 1.2648,
                                    "Rating": 1.5525
                                }
                            },
                            {
                                "no": 6,
                                "alternatif": "A6",
                                "nama": "Siengkong",
                                "criteria": {
                                    "Biaya": 1.581,
                                    "Stok": 0.9648,
                                    "Terjual": 0.8867999999999999,
                                    "Gudang": 1.2648,
                                    "Rating": 1.1640000000000001
                                }
                            },
                            {
                                "no": 7,
                                "alternatif": "A7",
                                "nama": "BOCI Baso Aci",
                                "criteria": {
                                    "Biaya": 1.581,
                                    "Stok": 0.6432,
                                    "Terjual": 0.8867999999999999,
                                    "Gudang": 1.2648,
                                    "Rating": 1.9405000000000001
                                }
                            },
                            {
                                "no": 8,
                                "alternatif": "A8",
                                "nama": "Abon Sapi Malioboro",
                                "criteria": {
                                    "Biaya": 1.581,
                                    "Stok": 0.9648,
                                    "Terjual": 0.8867999999999999,
                                    "Gudang": 1.2648,
                                    "Rating": 1.5525
                                }
                            },
                            {
                                "no": 9,
                                "alternatif": "A9",
                                "nama": "Kripik Usus dan Ceker",
                                "criteria": {
                                    "Biaya": 1.581,
                                    "Stok": 1.2864,
                                    "Terjual": 0.5912999999999999,
                                    "Gudang": 1.2648,
                                    "Rating": 1.1640000000000001
                                }
                            },
                            {
                                "no": 10,
                                "alternatif": "A10",
                                "nama": "Rosella Tea East Bali Cashew",
                                "criteria": {
                                    "Biaya": 1.581,
                                    "Stok": 0.9648,
                                    "Terjual": 0.5912999999999999,
                                    "Gudang": 1.2648,
                                    "Rating": 1.1640000000000001
                                }
                            }
                        ],
                        "ideal_solution_positive": {
                            "Biaya": 1.581,
                            "Stok": 1.2864,
                            "Terjual": 1.4781,
                            "Gudang": 1.2648,
                            "Rating": 1.1640000000000001
                        },
                        "ideal_solution_negative": {
                            "Biaya": 1.581,
                            "Stok": 0.6432,
                            "Terjual": 0.5912999999999999,
                            "Gudang": 1.2648,
                            "Rating": 1.9405000000000001
                        },
                        "positive_distance": [
                            {
                                "no": 1,
                                "alternatif": "A1",
                                "nama": "Pop Corn East Bali Cashew",
                                "distance": 0.751424
                            },
                            {
                                "no": 2,
                                "alternatif": "A2",
                                "nama": "Soaci (Seblak Baso Aci)",
                                "distance": 0.584685
                            },
                            {
                                "no": 3,
                                "alternatif": "A3",
                                "nama": "Kering Kentang Mustofa",
                                "distance": 1.027626
                            },
                            {
                                "no": 4,
                                "alternatif": "A4",
                                "nama": "Sambal Jawara Selera (20)",
                                "distance": 1.027626
                            },
                            {
                                "no": 5,
                                "alternatif": "A5",
                                "nama": "Teh Dedew Bacil Ori \/ Bacil Geprek",
                                "distance": 0.777171
                            },
                            {
                                "no": 6,
                                "alternatif": "A6",
                                "nama": "Siengkong",
                                "distance": 0.673099
                            },
                            {
                                "no": 7,
                                "alternatif": "A7",
                                "nama": "BOCI Baso Aci",
                                "distance": 1.168886
                            },
                            {
                                "no": 8,
                                "alternatif": "A8",
                                "nama": "Abon Sapi Malioboro",
                                "distance": 0.777171
                            },
                            {
                                "no": 9,
                                "alternatif": "A9",
                                "nama": "Kripik Usus dan Ceker",
                                "distance": 0.8868
                            },
                            {
                                "no": 10,
                                "alternatif": "A10",
                                "nama": "Rosella Tea East Bali Cashew",
                                "distance": 0.943314
                            }
                        ],
                        "negative_distance": [
                            {
                                "no": 1,
                                "alternatif": "A1",
                                "nama": "Pop Corn East Bali Cashew",
                                "distance": 0.967966
                            },
                            {
                                "no": 2,
                                "alternatif": "A2",
                                "nama": "Soaci (Seblak Baso Aci)",
                                "distance": 0.776693
                            },
                            {
                                "no": 3,
                                "alternatif": "A3",
                                "nama": "Kering Kentang Mustofa",
                                "distance": 0.436746
                            },
                            {
                                "no": 4,
                                "alternatif": "A4",
                                "nama": "Sambal Jawara Selera (20)",
                                "distance": 0.436746
                            },
                            {
                                "no": 5,
                                "alternatif": "A5",
                                "nama": "Teh Dedew Bacil Ori \/ Bacil Geprek",
                                "distance": 0.584201
                            },
                            {
                                "no": 6,
                                "alternatif": "A6",
                                "nama": "Siengkong",
                                "distance": 0.890898
                            },
                            {
                                "no": 7,
                                "alternatif": "A7",
                                "nama": "BOCI Baso Aci",
                                "distance": 0.2955
                            },
                            {
                                "no": 8,
                                "alternatif": "A8",
                                "nama": "Abon Sapi Malioboro",
                                "distance": 0.584201
                            },
                            {
                                "no": 9,
                                "alternatif": "A9",
                                "nama": "Kripik Usus dan Ceker",
                                "distance": 1.008295
                            },
                            {
                                "no": 10,
                                "alternatif": "A10",
                                "nama": "Rosella Tea East Bali Cashew",
                                "distance": 0.840463
                            }
                        ],
                        "preference_values": [
                            {
                                "no": 1,
                                "alternatif": "A1",
                                "nama": "Pop Corn East Bali Cashew",
                                "value": 0.6239746140097149
                            },
                            {
                                "no": 2,
                                "alternatif": "A2",
                                "nama": "Soaci (Seblak Baso Aci)",
                                "value": 0.6382884851436189
                            },
                            {
                                "no": 3,
                                "alternatif": "A3",
                                "nama": "Kering Kentang Mustofa",
                                "value": 0.15299384771572674
                            },
                            {
                                "no": 4,
                                "alternatif": "A4",
                                "nama": "Sambal Jawara Selera (20)",
                                "value": 0.15299384771572674
                            },
                            {
                                "no": 5,
                                "alternatif": "A5",
                                "nama": "Teh Dedew Bacil Ori \/ Bacil Geprek",
                                "value": 0.3610452911830398
                            },
                            {
                                "no": 6,
                                "alternatif": "A6",
                                "nama": "Siengkong",
                                "value": 0.6366086705080701
                            },
                            {
                                "no": 7,
                                "alternatif": "A7",
                                "nama": "BOCI Baso Aci",
                                "value": 0.060071122161328566
                            },
                            {
                                "no": 8,
                                "alternatif": "A8",
                                "nama": "Abon Sapi Malioboro",
                                "value": 0.3610452911830398
                            },
                            {
                                "no": 9,
                                "alternatif": "A9",
                                "nama": "Kripik Usus dan Ceker",
                                "value": 0.5638477434018981
                            },
                            {
                                "no": 10,
                                "alternatif": "A10",
                                "nama": "Rosella Tea East Bali Cashew",
                                "value": 0.4425323467865427
                            }
                        ],
                        "ranking": [
                            {
                                "nama": "Soaci (Seblak Baso Aci)",
                                "ranking": 1
                            },
                            {
                                "nama": "Siengkong",
                                "ranking": 2
                            },
                            {
                                "nama": "Pop Corn East Bali Cashew",
                                "ranking": 3
                            },
                            {
                                "nama": "Kripik Usus dan Ceker",
                                "ranking": 4
                            },
                            {
                                "nama": "Rosella Tea East Bali Cashew",
                                "ranking": 5
                            },
                            {
                                "nama": "Teh Dedew Bacil Ori \/ Bacil Geprek",
                                "ranking": 6
                            },
                            {
                                "nama": "Abon Sapi Malioboro",
                                "ranking": 7
                            },
                            {
                                "nama": "Kering Kentang Mustofa",
                                "ranking": 8
                            },
                            {
                                "nama": "Sambal Jawara Selera (20)",
                                "ranking": 9
                            },
                            {
                                "nama": "BOCI Baso Aci",
                                "ranking": 10
                            }
                        ]
                    }
                </code></pre>
            </div>
        </div>
    </div>
</div>


<?php include_once '../inc/footer.php'; ?>

