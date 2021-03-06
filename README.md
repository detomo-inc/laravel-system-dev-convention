# Laravel system development convention

## Overview

Tài liệu này có mục đích đưa ra các quy định về kiến trúc/cách thiết kế hệ thống, cũng như coding convention… của các dự án phát triển sử dụng PHP framework Laravel.

Tài liệu này bao gồm có
* Các quy ước (convention) phổ biến khi lập trình PHP/Laravel (chuẩn chung quốc tế).
* Các best practice khi lập trình sử dụng Laravel (chuẩn chung quốc tế).
* Các kiến trúc và thư viện do Detomo chọn lọc sử dụng cho các dự án của mình.

Các chủ đề được đề cập tới là:
1. [Basic convention](docs/Basic/README.md): Các quy định cơ bản nhất khi phát triển hệ thống sử dụng PHP/Laravel.
2. [Software Architecture](docs/SoftwareArchitecture/README.md): Quy ước chia layer khi thiết kế software (sử dụng Service layer và Repository layer ...)
3. [Laravel coding convention](docs/LaravelCodingConvention/README.md): Quy ước khi lập trình sử dụng framework Laravel (MVC design pattern, các component của Laravel, Laravel best practice).
4. [Solution collection](docs/Solutions/README.md): Các thư viện chọn lọc để giải quyết yêu cầu về các tính năng cụ thể.
5. [Experiences](docs/Experience/README.md)
6. Laravel + Vuejs: Xây dựng hệ thống theo kiến trúc backend/frontend.

## Hướng dẫn cách viết tài liệu

* Mỗi chủ đề trên sẽ được đặt trong một thư mục, với đầu vào là file README.md trong thư mục đó.
* Trong chủ đề đó, có thể phân cấp nội dung thành các file nhỏ hơn. Chú ý sự cân bằng để không chia thành quá nhiều file, dễ dàng cho người đọc cũng như cho người làm tài liệu.
* Các nội dung cần được thể hiện trong hệ thống sample.
* Các nội dung cần được bổ sung ví dụ (code) minh họa, hoặc link tới file trong sample code.

### Hệ thống sample

* Sử dụng DB sqlite database và commit file database này lên git repository.
* Thiết kế hệ thống sample.