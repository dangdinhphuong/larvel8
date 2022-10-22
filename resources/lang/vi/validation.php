<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute cần được đồng ý.',
    'accepted_if' => ':attribute cần được đồng ý khi :other là :value.',
    'active_url' => ':attribute không phải là đường dẫn hợp lệ.',
    'after' => ':attribute phải là một ngày sau :date.',
    'after_or_equal' => ':attribute phải là một ngày sau hoặc bằng :date.',
    'alpha' => ':attribute chỉ được chứa các chữ cái.',
    'alpha_dash' => ':attribute chỉ được chứa các chữ cái, số, dấu gạch ngang và dấu gạch dưới.',
    'alpha_num' => ':attribute chỉ được chứa các chữ cái và số.',
    'array' => ':attribute phải là một mảng.',
    'before' => ':attribute phải là một ngày trước :date.',
    'before_or_equal' => ':attribute phải là một ngày trước hoặc bằng :date.',
    'between' => [
        'numeric' => ':attribute phải ở khoảng :min và :max.',
        'file' => ':attribute phải nằm ở khoảng :min và :max kilobytes.',
        'string' => ':attribute phải nằm  giữa các kí tự :min and :max.',
        'array' => ':attribute phải có các mục giữa :min and :max .',
    ],
    'boolean' => 'Trường :attribute phải đúng hoặc sai.',
    'confirmed' => ':attribute nhận đinh không phù hợp.',
    'current_password' => 'Mật khẩu không đúng.',
    'date' => ':attribute không phải là ngày hợp lệ.',
    'date_equals' => ':attribute phải là một ngày bằng :date.',
    'date_format' => ':attribute không phù hợp với định dạng :format.',
    'declined' => ':attribute cần bị từ chối.',
    'declined_if' => ':attribute cần bị từ chối khi :other là :value.',
    'different' => ':attribute và :other cần khác nhau.',
    'digits' => ':attribute phải là chữ số :digits.',
    'digits_between' => ':attribute phải là chữ số giữa :min và :max .',
    'dimensions' => ':attribute có kích thước hình ảnh không hợp lệ.',
    'distinct' => ' Trường :attribute có giá trị trùng lặp.',
    'email' => ' :attribute phải là một địa chỉ email hợp lệ.',
    'ends_with' => ':attribute phải kết thúc bằng một trong những điều sau: :values.',
    'enum' => ':attribute được chọn không có hiệu lực.',
    'exists' => ':attribute được chọn không có hiệu lực.',
    'file' => ':attribute phải là một tập tin.',
    'filled' => 'Trường :attribute phải có một giá trị.',
    'gt' => [
        'numeric' => ':attribute phải lớn hơn :value.',
        'file' => ':attribute phải lớn hơn :value kilobytes.',
        'string' => ':attribute ký tự phải lớn hơn :value .',
        'array' => ':attribute các mục phải lớn hơn :value.',
    ],
    'gte' => [
        'numeric' => ':attribute phải lớn hơn hoặc bằng :value.',
        'file' => ':attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'string' => ':attribute ký tự phải lớn hơn hoặc bằng :value ',
        'array' => ':attribute các mục hoặc nhiều hơn phải lớn hơn :value.',
    ],
    'image' => ':attribute phải là một hình ảnh.',
    'in' => ':attribute đã chọn không hợp lệ.',
    'in_array' => 'Trường :attribute không tồn tại trong :other.',
    'integer' => ':attribute phải là số nguyên.',
    'ip' => ':attribute phải là một địa chỉ IP hợp lệ.',
    'ipv4' => ':attribute phải là một địa chỉ IPv4 hợp lệ.',
    'ipv6' => ':attribute phải là một địa chỉ IPv6 hợp lệ.',
    'json' => ':attribute phải là một chuỗi JSON hợp lệ.',
    'lt' => [
        'numeric' => ':attribute phải nhỏ hơn:value.',
        'file' => ':attribute phải nhỏ hơn:value kilobytes.',
        'string' => ':attribute ký tự phải nhỏ hơn:value.',
        'array' => ':attribute các mục phải nhỏ hơn :value.',
    ],
    'lte' => [
        'numeric' => ':attribute phải nhỏ hơn hoặc bằng :value.',
        'file' => ':attribute phải nhỏ hơn hoặc bằng:value kilobytes.',
        'string' => ':attribute ký tự phải nhỏ hơn hoặc bằng :value.',
        'array' => ':attribute các mục không được có nhiều hơn :value.',
    ],
    'mac_address' => ':attribute phải là một địa chỉ MAC hợp lệ.',
    'max' => [
        'numeric' => ':attribute không được lớn hơn :max.',
        'file' => ':attribute không được lớn hơn :max kilobytes.',
        'string' => ':attribute ký tự không được lớn hơn :max.',
        'array' => ':attribute các mục không được có nhiều hơn :max.',
    ],
    'mimes' => ':attribute phải là một loại tệp: :values.',
    'mimetypes' => ':attribute phải là một loại tệp: :values.',
    'min' => [
        'numeric' => ':attribute ít nhất phải là :min.',
        'file' => ':attribute ít nhất phải là :min kilobytes.',
        'string' => ':attribute ký tự ít nhất phải là :min.',
        'array' => ':attribute các mục phải có ít nhất :min.',
    ],
    'multiple_of' => ':attribute phải là bội số của :value.',
    'not_in' => ':attribute không hợp lệ.',
    'not_regex' => ':attribute định dạng không hợp lệ.',
    'numeric' => ':attribute phải là một số.',
    'password' => 'Mật khẩu không đúng.',
    'present' => 'Trường :attribute phải có.',
    'prohibited' => 'Trường :attribute bị cấm.',
    'prohibited_if' => 'Trường :attribute bị cấm khi :other là :value.',
    'prohibited_unless' => 'Trường :attribute bị cấm ngoại trừ :other là trong :values.',
    'prohibits' => 'Trường :attribute bị cấm từ :other .',
    'regex' => ':attribute định dạng không hợp lệ.',
    'required' => 'Trường :attribute là bắt buộc.',
    'required_array_keys' => 'Trường :attribute phải chứa các mục nhập cho: :values.',
    'required_if' => 'Trường :attribute được yêu cầu khi :other là :value.',
    'required_unless' => 'Trường :attribute là bắt buộc trừ khi :other là trong :values.',
    'required_with' => 'Trường :attribute là bắt buộc trừ khi :values .',
    'required_with_all' => 'Trường :attribute được yêu cầu khi :values .',
    'required_without' => 'Trường :attribute được yêu cầu khi không phải :values .',
    'required_without_all' => 'Trường :attribute bắt buộc khi không có :values.',
    'same' => ':attribute và :other phải phù hợp.',
    'size' => [
        'numeric' => ':attribute phải là :size.',
        'file' => ':attribute không được nặng quá :size kb.',
        'string' => ':attribute ký tự phải là :size.',
        'array' => ':attribute các mục phải chứa :size.',
    ],
    'starts_with' => ':attribute phải bắt đầu bằng một trong những điều sau: :values.',
    'string' => ':attribute phải là một chuỗi.',
    'timezone' => ':attribute phải là múi giờ hợp lệ.',
    'unique' => ':attribute đã được thực hiện.',
    'uploaded' => ':attribute không tải lên được.',
    'url' => ':attribute phải là một đường dẫn hợp lệ.',
    'uuid' => ':attribute phải là một UUID hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'Thông báo tùy chỉnh',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
