$('#country').change(
        function () {
            var international = ['Select', 'International'];
            var canada_province = ['Select', 'Alberta', 'British Columbia-Mainland', 'Manitoba', 'New Brunswick', 'Newfoundland & Labrador', 'Nova Scotia', 'Northwest Territories', 'Nunavut', 'Ontario', 'Prince Edward Island', 'Quebec', 'Saskatchewan', 'Yukon Territory'];
            var usa_province = ['Select', 'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'District of Columbia', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'];

            var country_drop_value = $('#country option:selected').val();

            $('#province').empty();
            $("#products option:eq(0)").prop("selected", true);
            $("#contact-info").css("display", "none");

            if (country_drop_value === "none")
            {
                $("#province_div").css("display", "none");
                $("#products_div").css("display", "none");
                $("#contact-info").css("display", "none");
            }

            if (country_drop_value === "International")
            {

                var option = '';
                for (i = 0; i < international.length; i++) {
                    option += '<option value="' + international[i] + '">' + international[i] + '</option>';
                }
                $('#province').append(option);
                $("#province_div").css("display", "flex");
            }


            if (country_drop_value === "Canada")
            {

                var option = '';
                for (i = 0; i < canada_province.length; i++) {
                    option += '<option value="' + canada_province[i] + '">' + canada_province[i] + '</option>';
                }
                $('#province').append(option);
                $("#province_div").css("display", "flex");
            }

            if (country_drop_value === "USA")
            {

                var option = '';
                for (i = 0; i < usa_province.length; i++) {
                    option += '<option value="' + usa_province[i] + '">' + usa_province[i] + '</option>';
                }
                $('#province').append(option);
                $("#province_div").css("display", "flex");
            }

        }
);
$('#province').change(
        function () {

            var products_array = ['Select', 'Indoor', 'Outdoor'];
            var country_drop_value = $('#province option:selected').val();

            $('#products').empty();
            $("#contact-info").css("display", "none");

            if (country_drop_value === "Select")
            {
                $("#products_div").css("display", "none");
                $("#contact-info").css("display", "none");
            }
            else
            {
                var option = '';
                for (i = 0; i < products_array.length; i++) {
                    option += '<option value="' + products_array[i] + '">' + products_array[i] + '</option>';
                }
                $('#products').append(option);
                $("#products_div").css("display", "flex");
            }
        });


$("#reset").click(function () {

    $("#country option:eq(0)").prop("selected", true);
    $("#province_div").css("display", "none");
    $("#products_div").css("display", "none");
    $("#contact-info").css("display", "none");
});