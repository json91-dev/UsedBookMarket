# 프로젝트명
> 점심한끼 (LunchOnMeal)


![](./UserBookMarket.gif)

(조금 기다리시면 데모 영상을 확인하실수 있습니다. - 비디오 로딩중 ...)

# 프로젝트 내용
집에서 버려지는 중고책을 사고 팔수 있는 웹사이트가 있으면 좋을것 같다고 생각해서 기획하고 개발하게 되었습니다.

간단한 로그인 기능 및, 이미지 업로드 기능과 쿠키를 이용한 장바구니 담기, 게시판 페이지네이션, 댓글기능, 마이 페이지 관리 등등을 백엔드까지 직접 구현해보았습니다.

처음 만들어본 웹사이트라 UI/UX 적으로는 부족하지만 웹개발자로 나아가는데에는 많은 공부가 되었던 프로젝트입니다.

(신입 개발자일때 포트폴리오로 만들어본 안드로이드 데모로 현재는 실행되지 않습니다.)
<br/>
<br/>


## 개발 환경 및 사용기술
* Language : PHP, JS, HTML

* OS : Ubuntu 16.04.2 LTS

* WebServer : Nginx

* Database : MySQL

* Protocol : HTTP, TCP/IP


<br/>

## 기능 설명

1. 회원가입 + 로그인기능
- 회원가입 정규식 검사
- 회원가입시 중복체크
- XHR을 통한 회원가입 요청 및 로그인 검증
- 세션을 이용한 로그인 유지
<br/><br/>

2. 중고책 리뷰게시판 (+ 이미지 업로드)
- 중고책에 대한 리뷰게시판 글 작성 기능
- File 함수를 통한 정적 파일 업로드 (HTTP POST를 이용)
<br/><br/>

3. 중고책 리뷰 추가, 수정, 삭제 기능
- 등록한 중고책에 대한 추가 수정 삭제 기능
<br/><br/>

3. 중고책 좋아요 기능
- 중고책 리뷰에 대한 좋아요 기능
<br/><br/>


4. 중고책 게시판 
- 게시판 Pagenation 기능
- 게시판 Sorting 기능 (날짜, 조회수, 좋아요)
<br/><br/>

5. 장바구니 기능
- 원하는 중고책을 카트에 담는 기능
- 장바구니에 추가하면 해당 상품을 브라우저 쿠키에 저장
<br/><br/>





