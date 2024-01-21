<style>
    .spinner {
        width: 40px;
        height: 40px;
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-top: 4px solid #8a6fc1;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    .option-holder {
        margin-top: 5px;

        label {
            color: #8a6fc1;
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<div class="modal" tabindex="-1" id="loginOrderModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="ms-4">Order Form</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <div class="card-body">
                    <div class="">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-12 mt-3 mt-md-0 p-3">
                                    <form action="{{ route('front.order.order') }}" method="POST"
                                        onsubmit="saveOrder(this,event)">
                                        @csrf
                                        <input type="hidden" id="ordermodal_product_id" name="product_id"
                                            value="">
                                        <div class="row">
                                            @php
                                                $setting = getOrderSetting();
                                            @endphp

                                            @if ($setting)
                                                <div class="col-12 col-12">
                                                    <!-- Changed class to col-md-6 col-12 -->
                                                    <div class="form-group mt-2">
                                                        <label for="name"
                                                            style="color: #8a6fc1">{{ $setting->name }}</label>
                                                        <input type="text" class="form-control" id="ordermodal_name"
                                                            name="name" required
                                                            placeholder=" {{ $setting->nameplaceholder }} ">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <!-- Changed class to col-md-6 col-12 -->
                                                    <div class="form-group mt-2">
                                                        <label for="phone"
                                                            style="color: #8776a9">{{ $setting->number }}</label>
                                                        <input type="text" class="form-control" id="ordermodal_phone"
                                                            name="phone_number"
                                                            placeholder="  {{ $setting->numberplaceholder }}" required
                                                            minlength="10" maxlength="10">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mt-2">
                                                        <label for="quantity" style="color: #8a6fc1">Optional Phone
                                                            Number</label>
                                                        <input type="text" class="form-control" id="ordermodal_altnumber"
                                                            name="altnumber" placeholder="  " minlength="10" maxlength="10">

                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mt-2">
                                                        <label for="quantity" style="color: #8a6fc1">District</label>
                                                        <input type="text" class="form-control" id="ordermodal_disctrict"
                                                            name="disctrict" list="districtlist" required>
                                                        <datalist id="districtlist">
                                                            <option value="Taplejung"> </option>
                                                            <option value="Panchthar"> </option>
                                                            <option value="Ilam"> </option>
                                                            <option value="Jhapa"> </option>
                                                            {{-- Koshi --}}
                                                            <option value="Morang"> </option>
                                                            <option value="Sunsari"> </option>
                                                            <option value="Dhankutta"> </option>
                                                            <option value="Sankhuwasabha"> </option>
                                                            <option value="Bhojpur"> </option>
                                                            <option value="Terhathum"></option>
                                                            {{-- Sagarmatha --}}
                                                            <option value="Okhaldunga"> </option>
                                                            <option value="Khotang"></option>
                                                            <option value="Solukhumbu"></option>
                                                            <option value="Udaypur"></option>
                                                            <option value="Saptari"></option>
                                                            <option value="Siraha"></option>
                                                            {{-- Janakpur --}}
                                                            <option value="Dhanusa"></option>
                                                            <option value="Mahottari"></option>
                                                            <option value="Sarlahi"></option>
                                                            <option value="Sindhuli"></option>
                                                            <option value="Ramechhap"></option>
                                                            <option value="Dolkha"></option>
                                                            {{-- Bagmati --}}
                                                            <option value="Sindhupalchauk"></option>
                                                            <option value="Kavreplanchauk"></option>
                                                            <option value="Lalitpur"></option>
                                                            <option value="Bhaktapur"></option>
                                                            <option value="Kathmandu"></option>
                                                            <option value="Nuwakot"></option>
                                                            <option value="Rasuwa"></option>
                                                            <option value="Dhading"></option>
                                                            {{-- Narayani --}}
                                                            <option value="Makwanpur"></option>
                                                            <option value="Rauthat"></option>
                                                            <option value="Bara"></option>
                                                            <option value="Parsa"></option>
                                                            <option value="Chitwan"></option>
                                                            {{-- Gandaki --}}
                                                            <option value="Gorkha"></option>
                                                            <option value="Lamjung"></option>
                                                            <option value="Tanahun">Tanahun</option>
                                                            <option value="Tanahun">Tanahun</option>
                                                            <option value="Syangja">Syangja</option>
                                                            <option value="Kaski">Kaski</option>
                                                            <option value="Manag">Manag</option>
                                                            {{-- Dhawalagiri --}}
                                                            <option value="Mustang">Mustang</option>
                                                            <option value="Parwat">Parwat</option>
                                                            <option value="Myagdi">Myagdi</option>
                                                            <option value="Myagdi">Myagdi</option>
                                                            <option value="Baglung">Baglung</option>
                                                            {{-- Lumbini --}}
                                                            <option value="Gulmi">Gulmi</option>
                                                            <option value="Palpa">Palpa</option>
                                                            <option value="Nawalparasi">Nawalparasi</option>
                                                            <option value="Rupandehi">Rupandehi</option>
                                                            <option value="Arghakhanchi">Arghakhanchi</option>
                                                            <option value="Kapilvastu">Kapilvastu</option>
                                                            {{-- Rapti --}}
                                                            <option value="Pyuthan">Pyuthan</option>
                                                            <option value="Rolpa">Rolpa</option>
                                                            <option value="Rukum">Rukum</option>
                                                            <option value="Salyan">Salyan</option>
                                                            <option value="Dang">Dang</option>
                                                            {{-- Bheri --}}
                                                            <option value="Bardiya">Bardiya</option>
                                                            <option value="Surkhet">Surkhet</option>
                                                            <option value="Dailekh">Dailekh</option>
                                                            <option value="Banke">Banke</option>
                                                            <option value="Jajarkot">Jajarkot</option>
                                                            {{-- Karnali --}}
                                                            <option value="Dolpa">Dolpa</option>
                                                            <option value="Humla">Humla</option>
                                                            <option value="Kalikot">Kalikot</option>
                                                            <option value="Mugu">Mugu</option>
                                                            <option value="Jumla">Jumla</option>
                                                            {{-- Seti --}}
                                                            <option value="Bajura">Bajura</option>
                                                            <option value="Bajhang">Bajhang</option>
                                                            <option value="Achham">Achham</option>
                                                            <option value="Doti">Doti</option>
                                                            <option value="Kailali">Kailali</option>
                                                            {{-- Mahakali --}}
                                                            <option value="Kanchanpur">Kanchanpur</option>
                                                            <option value="Dadeldhura">Dadeldhura</option>
                                                            <option value="Baitadi">Baitadi</option>
                                                            <option value="Darchula">Darchula</option>
                                                        </datalist>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <!-- Changed class to col-md-8 col-12 -->
                                                    <div class="form-group mt-2">
                                                        <label for="quantity"
                                                            style="color: #8a6fc1">{{ $setting->address }}</label>
                                                        <input type="text" class="form-control"
                                                            id="ordermodal_address" name="address"
                                                            placeholder=" {{ $setting->addressplaceholder }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <!-- Changed class to col-md-4 col-12 -->
                                                    <div class="form-group mt-2">
                                                        <label for="quantity"
                                                            style="color: #8a6fc1">{{ $setting->qtyy }}</label>
                                                        <input type="number" class="form-control"
                                                            id="ordermodal_quantity" name="quantity" value="1"
                                                            required placeholder=" {{ $setting->qtyyplaceholder }}">
                                                    </div>
                                                </div>
                                            @else
                                            @endif


                                            <div class="col-12">
                                                <div class="option-holder" id="yourDropdownContainer" name="option">
                                                </div>

                                            </div>


                                            <div id="order_spinner" class="pt-3" style="display: none;">
                                                <div class="mb-1 d-flex justify-content-center ">
                                                    <div class="spinner"></div>
                                                </div>
                                                <div class="text-center" style="color: #8a6fc1;">
                                                    Adding Order
                                                </div>
                                            </div>
                                            @if ($setting)
                                                <button type="submit" class="btn mt-3" id="order_button"
                                                    style="width: 94%; margin-left: 0.7rem; background-color: #8a6fc1; color:white;">
                                                    {{ $setting->btn }}</button>
                                            @endif


                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var orderLock = false;
    var orderOptions = {};

    function startOrder(product_id, optionsJson) {
        // console.log('Product ID:', product_id);
        // console.log('Options:', optionsJson);

        $('#ordermodal_product_id').val(product_id);
        $('#loginOrderModal').modal('show');

        try {
            const optionsArray = optionsJson.split('|');
            const allOptions = {};

            optionsArray.forEach(option => {
                const [key, values] = option.split(':');
                allOptions[key] = values.split(',');
            });

            document.getElementById('yourDropdownContainer').innerHTML = '';

            Object.keys(allOptions).forEach(category => {
                console.log('Category:', category);
                const dropdown = document.createElement('select');
                dropdown.name = category.toLowerCase();
                dropdown.id = category.toLowerCase();
                dropdown.classList.add('form-control');
                addOptionsToDropdown(dropdown, allOptions[category]);
                orderOptions[category] = allOptions[category][0];
                dropdown.onchange = function() {
                    orderOptions[category] = this.value;
                }

                const label = document.createElement('label');
                label.innerHTML = category + ': ';
                document.getElementById('yourDropdownContainer').appendChild(label);
                document.getElementById('yourDropdownContainer').appendChild(dropdown);

                document.getElementById('yourDropdownContainer').appendChild(document.createElement('br'));
            });

        } catch (error) {
            console.error('Error parsing options:', error);
        }
    }

    function createOption(value, text) {
        const option = document.createElement('option');
        option.value = value;
        option.text = text;
        return option;
    }

    function addOptionsToDropdown(dropdown, options) {
        // dropdown.appendChild(createOption('Select', 'Select'));

        options.forEach(value => {
            const option = createOption(value, value);
            dropdown.appendChild(option);
        });
    }




    function saveOrder(ele, e) {
        e.preventDefault();
        if (orderLock) {
            return;
        }
        console.log('test');
        orderLock = true;
        $('#order_button').hide();
        $('#order_spinner').show();
        const order = new FormData(ele);
        order.append('option', JSON.stringify(orderOptions));
        axios.post(ele.action, order)
            .then((res) => {
                $('#loginOrderModal').modal('hide');
                window.location.replace("{{ route('front.order.thankyou') }}");
            })
            .catch((err) => {

            })
            .finally(() => {
                $('#order_button').show();
                $('#order_spinner').hide();
            })
    }
</script>
