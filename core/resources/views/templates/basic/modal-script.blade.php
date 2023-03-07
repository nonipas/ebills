<script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        $(document).ready(function(){
            
            $('select[name=findBillingService]').change(function(){
              $('#billingService').val($(this).children('option:selected').data('name'));
            });
            $('select[name=findPaymentService]').change(function(){
              $('#paymentService').val($(this).children('option:selected').data('name'));
            });
            
            $('select[name=findBillingServiceData]').change(function(){
              $('#billingServiceData').val($(this).children('option:selected').data('name'));
            });
            $('select[name=findPaymentServiceData]').change(function(){
              $('#paymentServiceData').val($(this).children('option:selected').data('name'));
              $('#data_amount').val($(this).children('option:selected').data('amount'));
              $('#data_packageName').val($(this).children('option:selected').data('item'));
            });
            
            $('select[name=findBillingServiceCable]').change(function(){
              $('#billingServiceCable').val($(this).children('option:selected').data('name'));
            });
            $('select[name=findPaymentServiceCable]').change(function(){
              $('#paymentServiceCable').val($(this).children('option:selected').data('name'));
              $('#cable_amount').val($(this).children('option:selected').data('amount'));
              $('#cable_packageName').val($(this).children('option:selected').data('item'));
            });
            
            $('select[name=findBillingServiceMeter]').change(function(){
              $('#billingServiceMeter').val($(this).children('option:selected').data('name'));
            });
            $('select[name=findPaymentServiceMeter]').change(function(){
              $('#paymentServiceMeter').val($(this).children('option:selected').data('name'));
              $('#meter_packageName').val($(this).children('option:selected').data('item'));
            });
            
            /* select list of services
            $('#airtime_network').on('change',function(e) {
                $('#btn').html('<i class="spinner-grow spinner-grow-sm" role="status"></i> Fetching...')
                $('#btn').prop('disabled', true)
                $.post('{{ route('get-services') }}', {_token:'{{ csrf_token() }}', type:'html', service:'airtime', billerid:e.target.value}, function(data){
                    $('#payment_service').html(data)
                    $('#btn').prop('disabled', false).html('Proceed <i class="la la-send"></i>')
                });
            })
            */
            // data
            $('#data_network').on('change',function(e) {
                $('#btnData').html('<i class="spinner-grow spinner-grow-sm" role="status"></i> Fetching...')
                $('#btnData').prop('disabled', true)
                $.post('{{ route('get-services') }}', {_token:'{{ csrf_token() }}', type:'html', service:'data', billerid:e.target.value}, function(data){
                    $('#data_package').html(data)
                    $('#btnData').prop('disabled', false).html('Proceed <i class="la la-send"></i>')
                });
            })
            
            // cable
            $('#cable_brand').on('change',function(e) {
                $('#btnCable').html('<i class="spinner-grow spinner-grow-sm" role="status"></i> Fetching plans...')
                $('#btnCable').prop('disabled', true)
                $.post('{{ route('get-services') }}', {_token:'{{ csrf_token() }}', type:'html', service:'cable', billerid:e.target.value}, function(data){
                    $('#cable_package').html(data)
                    $('#btnCable').prop('disabled', false).html('Proceed <i class="la la-send"></i>')
                });
            })
            // verify customer
            $('#cable_package').on('change',function(e) {
                $('#cable_customer').val('')
                $('#cable_customer').attr('placeholder', 'Verifying...')
                $('#btnCable').html('<i class="spinner-grow spinner-grow-sm" role="status"></i> Verifying...')
                $('#btnCable').prop('disabled', true)
                $.post('{{ route('validate-customer') }}', {_token:'{{ csrf_token() }}', type:'html', service:'cable', customer_id:$('#cable_smartcard').val(), package:$('#cable_brand').val()}, function(data){
                    if(data.status=='success'){
                        $('#cable_customer').val(data.customer)
                        $('#btnCable').prop('disabled', false).html('Proceed <i class="la la-send"></i>')
                    }else{
                        $('#cable_customer').val(data.customer)
                        $('#btnCable').prop('disabled', true).html('Proceed <i class="la la-send"></i>')
                    }
                    
                });
            })
            
            // meter
            /*
            $('#meter_name').on('change',function(e) {
                $('#btnMeter').html('<i class="spinner-grow spinner-grow-sm" role="status"></i> Fetching plans...')
                $('#btnMeter').prop('disabled', true)
                $.post('{{ route('get-services') }}', {_token:'{{ csrf_token() }}', type:'html', service:'meter', billerid:e.target.value}, function(data){
                    console.log(data)
                    $('#meter_package').html(data)
                    $('#btnMeter').prop('disabled', false).html('Proceed <i class="la la-send"></i>')
                });
            })
            */
            // verify customer
            $('#meter_name').on('change',function(e) {
                $('#btnMeter').html('<i class="spinner-grow spinner-grow-sm" role="status"></i> Verifying...')
                $('#meter_customer').val('')
                $('#meter_customer').attr('placeholder', 'Verifying...')
                $('#btnMeter').prop('disabled', true)
                $.post('{{ route('validate-customer') }}', {_token:'{{ csrf_token() }}', type:'html', service:'meter', customer_id:$('#meter_no').val(), biller_code:$(this).children('option:selected').data('code'), item_code:$(this).children('option:selected').data('item'), meter_name:$('#meter_name').val(), package:e.target.value}, function(data){
                    
                    if(data.status =='success') {
                        $('#meter_customer').val(data.customer)
                        $('#btnMeter').prop('disabled', false).html('Proceed <i class="la la-send"></i>')
                    }
                    $('#meter_customer').val(data.customer)
                    $('#btnMeter').prop('disabled', false).html('Proceed <i class="la la-send"></i>')
                    
                });
            })
            
        });
        
        
        $("form#airtime-payment").submit(function(e){
          e.preventDefault();
           
          var transaction = {
              customer_phone: $('#airtime_phone').val(),
              amount: $('#airtime_amount').val(),
              billerCode: $('#airtime_network').val(),
              customer_email: $('#airtime_email').val(),
              token: $('#airtime_token').val(),
              service: $('#billingService').val(),
              //payment_service: $('#paymentService').val(),
              payment_method: $('#payoption').val(),
              action: 'airtime_payment'
          };
            
          let data = {
              email: transaction.customer_email,
              phone: transaction.customer_phone,
              amount: transaction.amount,
              token: transaction.token,
              billerCode: transaction.billerCode,
              service: transaction.service,
              payment_service: transaction.payment_service,
              btn: 'payAirtime',
              transaction: transaction
          }
        
            if(transaction.payment_method == 1){
                //   invoke paystack
                  PaystackPayment(data) 
            }
    
    	});
    	
    	$("form#data-payment").submit(function(e){
          e.preventDefault();
           
          var transaction = {
              data_phone: $('#data_phone').val(),
              data_package: $('#data_package').val(),
              data_packageName: $('#data_packageName').val(),
              amount: $('#data_amount').val(),
              billerCode: $('#data_network').val(),
              customer_email: $('#data_email').val(),
              token: $('#data_token').val(),
              service: $('#billingServiceData').val(),
              payment_service: $('#paymentServiceData').val(),
              payment_method: $('#data_payoption').val(),
              action: 'data_payment'
          };
            
          let data = {
              email: transaction.customer_email,
              phone: transaction.customer_phone,
              amount: transaction.amount,
              token: transaction.token,
              billerCode: transaction.billerCode,
              service: transaction.service,
              payment_service: transaction.payment_service,
              btn: 'payData',
              transaction: transaction
          }
        
            if(transaction.payment_method == 1){
                //   invoke paystack
                  PaystackPayment(data) 
            }
    
    	});
    	
    	$("form#cable-payment").submit(function(e){
          e.preventDefault();
           
          var transaction = {
              cable_phone: $('#cable_phone').val(),
              cable_smartcard: $('#cable_smartcard').val(),
              cable_package: $('#cable_package').val(),
              cable_packageName: $('#cable_packageName').val(),
              cable_customer: $('#cable_customer').val(),
              amount: $('#cable_amount').val(),
              billerCode: $('#cable_brand').val(),
              customer_email: $('#cable_email').val(),
              token: $('#cable_token').val(),
              service: $('#billingServiceCable').val(),
              payment_service: $('#paymentServiceCable').val(),
              payment_method: $('#cable_payoption').val(),
              action: 'cable_payment'
          };
          
          // add charges
          charges = 100;
          let data = {
              email: transaction.customer_email,
              phone: transaction.customer_phone,
              amount: parseInt(transaction.amount) + parseInt(charges),
              token: transaction.token,
              billerCode: transaction.billerCode,
              service: transaction.service,
              payment_service: transaction.payment_service,
              btn: 'payCable',
              transaction: transaction
          }
        
            if(transaction.payment_method == 1){
                //   invoke paystack
                  PaystackPayment(data) 
            }
    
    	});
    	
    	
    	$("form#meter-payment").submit(function(e){
          e.preventDefault();
           
          var transaction = {
              meter_phone: $('#meter_phone').val(),
              meter_no: $('#meter_no').val(),
              meter_package: $('#meter_package').val(),
              meter_packageName: $('#meter_packageName').val(),
              meter_customer: $('#meter_customer').val(),
              amount: $('#meter_amount').val(),
              billerCode: $('#meter_name').val(),
              customer_email: $('#meter_email').val(),
              token: $('#meter_token').val(),
              service: $('#billingServiceMeter').val(),
              payment_service: $('#paymentServiceMeter').val(),
              payment_method: $('#meter_payoption').val(),
              action: 'meter_payment'
          };
            
          let data = {
              email: transaction.customer_email,
              phone: transaction.customer_phone,
              amount: transaction.amount,
              token: transaction.token,
              billerCode: transaction.billerCode,
              service: transaction.service,
              payment_service: transaction.payment_service,
              btn: 'payMeter',
              transaction: transaction
          }
        
            if(transaction.payment_method == 1){
                //   invoke paystack
                  PaystackPayment(data) 
            }
    
    	});
    </script>
    
    <script>
    
        function SendPurchaseRequest(data = {}) {
            var form = document.createElement("form");
            var element1 = document.createElement("input"); 
            var element2 = document.createElement("input");
            var element3 = document.createElement("input");
            var element4 = document.createElement("input");
            var element5 = document.createElement("input");
            
            form.method = "POST";
            form.action = "{{ route('send-purchase-request') }}";   
        
            element1.value=data.paystack_ref_code;
            element1.name="ref_code";
            form.appendChild(element1);  
        
            element2.value=data.amount;
            element2.name="amount_paid";
            form.appendChild(element2);
            
            element3.value=JSON.stringify(data.transaction);
            element3.name="data";
            form.appendChild(element3);
            
            element4.value="{{ csrf_token() }}";
            element4.name="_token";
            form.appendChild(element4);
            
            element5.value=data.transaction.action;
            element5.name="action";
            form.appendChild(element5);
        
            document.body.appendChild(form);
            form.submit();
        
        }
        
        function RequiredField(value) {
            if(value =='') {
                return "<span class='text-danger'>* Required</span>";
            }else{
                return "<span class='text-success'>"+value+"</span>";
            }
        }
        
        function ProceedAirtimeSummary()
        {
            let validate = false
            let network = $('#airtime_network').val()
            let phone = $('#airtime_phone').val()
            let amount = $('#airtime_amount').val()
            let email = $('#airtime_email').val()
            let token = $('#airtime_token').val()
            let service = network
            let payment_service = $('#paymentService').val()
            
            // check
            if(network =="" || phone=="" || amount =="" || email =="" || token=="" || service ==""){
                $('#summary_network').html(RequiredField(service))
                $('#summary_phone').html(RequiredField(phone))
                $('#summary_amount').html(RequiredField(amount))
                $('#summary_email').html(RequiredField(email))
                $('#summary_token').html(RequiredField(token))
                
            }else{
                validate = true
                $('#summary_network').html(RequiredField(service))
                $('#summary_phone').html(RequiredField(phone))
                $('#summary_amount').html(RequiredField(amount))
                $('#summary_email').html(RequiredField(email))
                $('#summary_token').html(RequiredField(token))
                
            }
            
            if(validate == false) {
                $('#payAirtime').prop('disabled', true)
            }else{
                $('#payAirtime').prop('disabled', false)
            }
        }
        
        function ProceedDataSummary()
        {
            let validate = false
            let data_phone = $('#data_phone').val()
            let data_package = $('#data_package').val()
            let data_packageName = $('#data_packageName').val()
            let amount = $('#data_amount').val()
            let customer_email = $('#data_email').val()
            let token = $('#data_token').val()
            let service = $('#billingServiceData').val()
            let payment_service = $('#paymentServiceData').val()
            
            // check
            if(data_phone =="" || data_package =="" || customer_email =="" || token=="" || service =="" || payment_service =="" || data_packageName =="" || amount ==""){
                $('#summary_data_phone').html(RequiredField(data_phone))
                $('#summary_data_package').html(RequiredField(service))
                $('#summary_data_email').html(RequiredField(customer_email))
                $('#summary_data_packageName').html(RequiredField(data_packageName))
                $('#summary_data_amount').html(RequiredField(amount))
                $('#summary_data_token').html(RequiredField(token))
                
            }else{
                validate = true
                $('#summary_data_phone').html(RequiredField(data_phone))
                $('#summary_data_package').html(RequiredField(service))
                $('#summary_data_email').html(RequiredField(customer_email))
                $('#summary_data_packageName').html(RequiredField(data_packageName))
                $('#summary_data_amount').html(RequiredField(amount))
                $('#summary_data_token').html(RequiredField(token))
                
            }
            
            if(validate == false) {
                $('#payData').prop('disabled', true)
            }else{
                $('#payData').prop('disabled', false)
            }
        }
        
        function ProceedCableSummary()
        {
            let validate = false
            let cable_phone = $('#cable_phone').val()
            let cable_smartcard = $('#cable_smartcard').val()
            let cable_package = $('#cable_package').val()
            let cable_packageName = $('#cable_packageName').val()
            let cable_customer = $('#cable_customer').val()
            let amount = $('#cable_amount').val()
            let customer_email = $('#cable_email').val()
            let token = $('#cable_token').val()
            let service = $('#billingServiceCable').val()
            let payment_service = $('#paymentServiceCable').val()
            
            // check
            if(cable_phone =="" || cable_smartcard=="" || cable_package =="" || customer_email =="" || token=="" || service =="" || payment_service =="" || cable_packageName =="" || amount ==""){
                $('#summary_cable_phone').html(RequiredField(cable_phone))
                $('#summary_cable_smartcard').html(RequiredField(cable_smartcard))
                $('#summary_cable_package').html(RequiredField(service))
                $('#summary_cable_email').html(RequiredField(customer_email))
                $('#summary_cable_packageName').html(RequiredField(cable_packageName))
                $('#summary_cable_amount').html(RequiredField(amount))
                $('#summary_cable_customer').html(RequiredField(cable_customer))
                $('#summary_cable_token').html(RequiredField(token))
                
            }else{
                validate = true
                $('#summary_cable_phone').html(RequiredField(cable_phone))
                $('#summary_cable_smartcard').html(RequiredField(cable_smartcard))
                $('#summary_cable_package').html(RequiredField(service))
                $('#summary_cable_email').html(RequiredField(customer_email))
                $('#summary_cable_packageName').html(RequiredField(cable_packageName))
                $('#summary_cable_amount').html(RequiredField(amount))
                $('#summary_cable_customer').html(RequiredField(cable_customer))
                $('#summary_cable_token').html(RequiredField(token))
                
            }
            
            if(validate == false) {
                $('#payCable').prop('disabled', true)
            }else{
                $('#payCable').prop('disabled', false)
            }
        }
        
        function ProceedMeterSummary()
        {
            let validate = false
            let meter_phone = $('#meter_phone').val()
            let meter_no = $('#meter_no').val()
            let meter_package = $('#meter_package').val()
            let meter_packageName = $('#meter_packageName').val()
            let meter_customer = $('#meter_customer').val()
            let amount = $('#meter_amount').val()
            let customer_email = $('#meter_email').val()
            let token = $('#meter_token').val()
            let service = $('#billingServiceMeter').val()
            let payment_service = $('#paymentServiceMeter').val()
            
            // check
            if(meter_phone =="" || meter_no=="" || customer_email =="" || token=="" || service =="" || amount ==""){
                $('#summary_meter_phone').html(RequiredField(meter_phone))
                $('#summary_meter_no').html(RequiredField(meter_no))
                $('#summary_meter_package').html(RequiredField(service))
                $('#summary_meter_email').html(RequiredField(customer_email))
                $('#summary_meter_packageName').html(RequiredField(meter_packageName))
                $('#summary_meter_amount').html(RequiredField(amount))
                $('#summary_meter_customer').html(RequiredField(meter_customer))
                $('#summary_meter_token').html(RequiredField(token))
                
            }else{
                validate = true
                $('#summary_meter_phone').html(RequiredField(meter_phone))
                $('#summary_meter_no').html(RequiredField(meter_no))
                $('#summary_meter_package').html(RequiredField(service))
                $('#summary_meter_email').html(RequiredField(customer_email))
                $('#summary_meter_packageName').html(RequiredField(meter_packageName))
                $('#summary_meter_amount').html(RequiredField(amount))
                $('#summary_meter_customer').html(RequiredField(meter_customer))
                $('#summary_meter_token').html(RequiredField(token))
                
            }
            
            if(validate == false) {
                $('#payMeter').prop('disabled', true)
            }else{
                $('#payMeter').prop('disabled', false)
            }
        }
        
        function PaystackPayment(data = {}){
            
            let pay_amount_init = parseInt(data.amount)
            let pay_amount_charge= parseInt(pay_amount_init * 1.0090)
            let charge = (pay_amount_init * 0.015)
    
            console.log(charge);
    
            let pay_amount= ((pay_amount_init + charge) * 100).toFixed(2)
          
            var name= data.name;
            var email = data.email;
            var phone = data.phone;
    
            var handler = PaystackPop.setup({
              key: "pk_test_27899496a59bca2105fbe49c0ec25f91aa68a7a6",
              email: email,
              amount: pay_amount,
              firstname: name,
              lastname: name,
              metadata: {
                 custom_fields: [
                    {
                        display_name: "Mobile Number",
                        variable_name: "mobile_number",
                        value: phone
                    },
                    {
                        display_name: "Ebeano Token",
                        variable_name: "ebeano_token",
                        value: data.token
                    }
                 ]
              },
              callback: function(response){
                  console.log(response.reference);
                  var paystack_ref_code=response.reference;
                  
                  let pay_data = {
                      paystack_ref_code:paystack_ref_code,
                      amount: pay_amount_init,
                      transaction: data.transaction
                  }
                //   invoke send request
                    SendPurchaseRequest(pay_data)
              },
              onClose: function(){
                  console.log('window closed');
                  document.getElementById('btn').innerHTML="Pay";
              }
            });
            handler.openIframe();
            
        }
    </script>