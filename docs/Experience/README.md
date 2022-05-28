# Một số kinh nghiệm bổ sung

## Don't repeat yourself (DRY)

* Tái sử dụng code của bạn bất cứ khi nào có thể. Hễ bạn thấy đoạn code nào được viết từ 2 lần trở lên, hãy nghiên cứu đưa nó về 1 hàm và gọi đến, nhiều hàm có cùng điểm giống nhau thì tổ chức thành class.
* Thậm chí nếu các code không được viết giống hệt nhau, nhưng mình biết về cơ bản nó là cùng một flow xử lý, thì cũng nền tìm cách đưa nó thành code sử dụng chung.

## Database

### SQLite

Khi dùng SQLite database, phần khai báo trong file .env sẽ được viết như sau (giả sử file DB là database/my_database.sqlite).
```env
DB_CONNECTION=sqlite
DB_FOREIGN_KEYS=true
DB_DATABASE=database/my_database.sqlite
```
và xóa (comment out) các phần khai báo DB_xxx khác đi.

## Array
* Để dấu phẩy sau phần tử cuối cùng của array.
  Điều này sẽ giúp dễ dàng mỗi khi bổ sung phần tử mới vào array (không sợ quên dấu phẩy ở phần tử phía trước), cũng không khiến diff báo dòng phía trước có sự khác biệt.
    ```php
    $arr = [
        'a' => 'This is a',
        'b' => 'This is b',
    ];
    ```

## Refactoring code

* Để có thể tự tin refactoring code thì cần có auto test code. Nếu không có auto test code thì cũng vẫn có thể refactoring, nhưng phải cực kỳ cẩn thận và chỉ nên làm với những function tương đối đơn giản, rõ ràng.
* Nếu muốn thêm tính năng vào function (thường là thêm điều kiện cho xử lý), mà có nguy cơ khiến function phình to, thì ta phải làm nhỏ function lại bằng cách chia một phần nội dung trong function đó ra thành các function nhỏ hơn. Sau khi test/review code này rồi mới tiến hành thêm tính năng vào function.
* Don’t repeat yourself (DRY): Không copy/paste code qua nhiều function. Nếu có vẻ như có một xử lý được viết lặp lại ở nhiều chỗ, thì cần xem xét làm một function bao hàm phần xử lý chung đó, sau đó refactoring lại những xử lý cũ để cho gọi function này (không chỉ là việc code bị copy nguyên xi, mà chỉ cần phát hiện ra flow xử lý có sự giống nhau cũng nên tiến hành refactoring).
* Ghi chú cho đoạn code của bạn, nhưng hơn hết hãy đặt tên hàm và biến có ý nghĩa

## Documentation

* Các function cần phải có document giải thích nó làm gì. Có thông tin về parameter trong document, ít nhất là data type type. Trong khả năng có thể thì khai báo luôn data type trong function definition.
  Ví dụ
    ```php
    /**
     * Copy data from another employee to this object.
     * @param Employee $employee
     * @return Employee $this object.
     */
    public function copyEmployee(Employee $source)
    {
        $this->attributes = $source->attributes;
    }
    ```
* Có thông tin về class variable trong document, ít nhất là data type. Cái này sẽ có lợi cho IDE trong việc đưa ra code assistance.
  Ví dụ
    ```php
    /**
     * Manipulate employee record in DB.
     */
    class Employee
    {
        /**
        * Name of employee.
        * @var string
        */
        private $name;
    }
    ```
* Đôi khi, khai báo kiểu của biến trong đoạn code sẽ giúp IDE hỗ trợ (code assistance).
  Ví dụ
    ```php
    /** @var Employee $employee */
    $employee = Employee::findOne(['id' => $id]);
    $employee->status = 1;
    ```

## Documentation generation(TBD)
## Testing (TBD)
