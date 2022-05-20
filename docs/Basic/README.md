# Basic convention

## Overview

Tài liệu này mô tả các convention cơ bản nhất, được xem là bản convention tối thiểu khi phát triển hệ thống PHP/Laravel.

Với các bạn fresher, ban đầu chỉ yêu cầu làm theo phiên bản này. Cùng với sự trưởng thành của member, sẽ yêu cầu học tập và áp dụng các phần convention khó hơn.

Nội dung tài liệu này gồm có
* PHP coding convention.
  * Tóm tắt quy tắc cơ bản
  * PSR (PHP Standards Recommendations)
* Laravel basic convention.

## PHP coding convention

### Tóm tắt quy tắc cơ bản

#### Quy tắc đặt tên - naming convention

* Tên lớp: (đặt theo PascalCase) viết hoa chữ cái đầu tiên của mỗi từ.
    Ví dụ: `Product`, `Customer`.
* Tên biến: (đặt theo camelCase) ký tự đầu tiên của từ đầu tiên viết thường, những ký tự đầu tiên của những từ tiếp theo viết hoa.
    Ví dụ: `productName`, `productPrice`.
* Tên hàm: (đặt theo camelCase) ký tự đầu tiên của từ đầu tiên viết thường, những ký tự đầu tiên của những từ tiếp theo viết hoa.
    Ví dụ: `getProductName()`, `setProductPrice()`.
* Hằng số: đặt theo UPPER_CASE. Ví dụ: `CLICK_COUNTER`. Các hằng số cùng một nhóm nên có cùng tiếp đầu ngữ. Ví dụ dưới đây các hằng số chung nhau tiếp đầu ngữ *USER_TYPE*.
    ```php
    const USER_TYPE_NORMAL = 1;
    const USER_TYPE_ADMIN = 2;
    const USER_TYPE_SUPERVISOR = 3;
    ```
* Tên biến, tên lớp: thường là danh từ, cụm danh từ hoặc tính từ. VD: `UserModel`, `userName`, `downloadCounter`, `isDownloaded`.
* Tên hàm thường bắt đầu bằng động từ. VD: `getUserName()`, `setUserName()`, `increaseDownloadCounter()`.
* Tên phải có nghĩa, không được đặt tên kiểu viết tắt. VD: `uName, pName, idl, a, a1, doFA`.
* Tránh đặt những tên quá chung chung, tối nghĩa. VD: `top, doIncrease, getAll`.

#### Quy tắc về số lượng

* Hàm không nên quá 30 dòng.
* Lớp không nên vượt quá 500 dòng.
* Một hàm không được vượt quá 5 tham số (nên giữ <=3).
* Một hàm chỉ làm duy nhất 1 việc, trong trường hợp cần thiết, có thể cho phép làm 2 việc, tuy nhiên tên hàm phải nói rõ điều này. VD: `increaseDownloadCounterAndSaveToDatabase()`.
* Khi khai báo biến, một dòng chỉ chứa một biến. Không viết kiểu `$a = $b = 2;`
* Một dòng không nên dài quá 80 ký tự.
* Các câu lệnh lồng nhau tối đa 4 cấp.

#### Quy tắc xuống hàng

* Nếu có dấu "," thì xuống hàng sau dấu ",".
    ```php
        someMethod(longExpression1, longExpression2, longExpression3,
                longExpression4, longExpression5);

        var = someMethod1(longExpression1,
                        someMethod2(longExpression2,
                                longExpression3));
    ```
* Xuống hàng trước toán tử + - ...
    ```php
        longName1 = longName2 * (longName3 + longName4 - longName5)
                   + 4 * longname6; // PREFER

        longName1 = longName2 * (longName3 + longName4
                               - longName5) + 4 * longname6;
    ```
* Nếu có nhiều cấp lồng nhau, thì xuống hàng theo từng cấp.
* Dòng xuống hàng mới thì được bắt đầu ở cùng cột với đoạn lệnh cùng cấp ở trên.

#### Comment

* Hạn chế dùng comment để giải thích code, thay vào đó hãy cải thiện đoạn code của bạn.
    Tuy nhiên, nếu chưa đủ năng lực để viết code thật tốt (hàm thật ngắn gọn), hãy để 1 dòng comment giải thích qua đoạn code này làm gì.
* Chỉ nên dùng comment khi viết documentation cho thư viện, thông tin đính kèm cho class …

### Chi tiết hơn về PSR (PHP Standards Recommendations)

* PHP có một chuẩn viết code là PSR. PSR là viết tắt của từ PHP Standards Recommendation.
* Hiện tại thì có 5 chuẩn từ PSR-0 đến PSR-12 do các thành viên của nhóm FIG(Framework Interop Group) đề xuất. Trong này có những chuẩn bị loại bỏ và được thay thế bằng chuẩn mới (ví dụ PSR-12 thay thế cho PSR-2).

#### Chuẩn PSR-0, PSR-4: Chuẩn Autoloading

Những mô tả sau bắt buộc phải tuân theo:

* Khi khai báo class bạn BUỘC PHẢI khai báo namespace.
* Một namespace và class đầy đủ điều kiện phải có cấu trúc như sau: `<Vendor Name>(<Namespace>)*<Class Name>`
* Mỗi namespace phải có một top-level namespace (“Vendor name”), gọi là namespace gốc.
* Mỗi namespace có thể có nhiều sub-namespace (namespace con).

#### Chuẩn PSR-1 : Chuẩn cơ bản

* Code phải được viết trong cặp thẻ `<?php ?>` và cặp thẻ ngắn `<?= ?>` thay cho echo. Không sử dụng các thẻ kiểu `<? ?>`.
* File chỉ được sử dụng UTF-8 không có BOM (BOM - Byte Order Mark là các chuỗi EF,BB,BF ở đầu file cho phép phần mềm biết đây là 1 file UTF-8).
* Mỗi một file PHP chỉ nên làm 1 nhiệm vụ duy nhất, tránh chồng chéo (gọi là side effect).
* Namespace phải tuân theo chuẩn PSR “autoloading” (PSR-0, PSR-4).
* Tên class phải viết theo quy tắc PascalCase.
* Các hẳng số phải viết hoa tất cả các chữ, cách nhau bằng dấu gạch chân.
* Tên hàm viết theo quy tắc camelCase.

Chi tiết tham khảo tại

* [PSR-1 phiên bản tiếng Anh](https://www.php-fig.org/psr/psr-1/)
* [PSR-1 bản tiếng Việt dịch bởi Google Translation](https://www-php--fig-org.translate.goog/psr/psr-1/?_x_tr_sl=en&_x_tr_tl=vi&_x_tr_hl=ja&_x_tr_pto=wapp)

#### Chuẩn PSR-12: Chuẩn mở rộng

* Code phải tuân thủ PSR-1 & PSR-0.
* File phải sử dụng ký tự xuống dòng kiểu Unix (LF - linefeed).
* Bỏ dấu `?>` nếu file đó là file thuần PHP (chỉ cần mở đầu bằng `<?php` mà không cần đóng).
* Không được có 1 dòng trắng ở cuối cùng của file.
* Trên 1 dòng không vượt quá 120 kí tự, tốt nhất nên nhỏ hơn hoặc bằng 80 kí tự, không nên có kí tự trắng ở cuối dòng.
* Phải có 1 dòng trắng sau khi khai báo namespace và phải có 1 dòng trắng sau các khai báo use.
* Không viết nhiều hơn 1 câu lệnh trên 1 dòng. Không viết
    ```php
    echo "Hello"; return;
    ```
* Sử dụng 4 khoảng trắng(spaces) để thụt dòng, tuyệt đối không dùng tab (bạn có thể khai báo trong công cụ lập trình để khi ấn tab nó tương đương với việc thụt vào 4 spaces).
* Thẻ đóng và mở của 1 hàm {} phải nằm riêng biệt trên một dòng.
* Trước thẻ mở và đóng hàm {} thì không được có 1 dòng trắng.
* Phải dùng dấu nháy đơn ' để khai báo chuỗi không chứa biến, nếu chuỗi có chứa kí tự ' thì dùng dấu nháy kép để bọc bên ngoài (chúng ta rất hay nhầm vấn đề này).
* Dùng dấu chấm . để nối chuỗi, chú ý trước và sau dấu chấm . phải có khoảng trắng. Nếu chuỗi quá dài thì tách làm nhiều dòng và dấu chấm được đặt đầu dòng ngang với dấu bằng.
* Các tham số truyền vào hàm phải có 1 dấu cách trước dấu phẩy, bạn có thể tách thành nhiều dòng nhưng phải thụt lề 1 đơn vị.
* Đối với khối lệnh switch case thì case phải lùi 4 khoảng trắng so với switch, và các lệnh trong case cũng phải lùi 4 khoảng trắng so với case. Phải có từ khóa break hoặc return, trong trường hợp nào không có thì phải comment //no break
* Nếu phải sử dụng abstract và final hay static để khai báo hàm thì bạn phải khai báo theo thứ tự.
* Phải có 1 khoảng trắng trước và sau phép toán, khi ép kiểu thì phải có 1 khoảng trắng ngăn cách giữa kiểu dữ liệu và biến được ép kiểu.

Chi tiết tham khảo tại

* [PSR-12 phiên bản tiếng Anh](https://www.php-fig.org/psr/psr-12/)
* [PSR-12 bản tiếng Việt dịch bởi Google Translation](https://www-php--fig-org.translate.goog/psr/psr-12/?_x_tr_sl=en&_x_tr_tl=vi&_x_tr_hl=ja&_x_tr_pto=wapp)

## Tham khảo

* [Coding Conventions và các chuẩn viết code trong PHP](https://viblo.asia/p/coding-conventions-va-cac-chuan-viet-code-trong-php-naQZRbrGZvx), hơi cũ
