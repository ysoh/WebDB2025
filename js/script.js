document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.btn-edit');
    const deleteButtons = document.querySelectorAll('.btn-delete');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const musicId = this.getAttribute('data-id');
            alert(`ID가 ${musicId}인 음악을 수정합니다.`);
            console.log(`수정 버튼 클릭: ID ${musicId}`);
        });
    });

    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const musicId = this.getAttribute('data-id');
            const isConfirmed = confirm(`ID가 ${musicId}인 음악을 정말로 삭제하시겠습니까?`);
            if (isConfirmed) {
                alert(`ID가 ${musicId}인 음악을 삭제합니다.`);
                console.log(`삭제 버튼 클릭: ID ${musicId}`);
            }
        });
    });

    // 파일 첨부 관련 스크립트 추가
    const songImageInput = document.getElementById('song_image');
    const fileNameDisplay = document.getElementById('file-name');

    if (songImageInput && fileNameDisplay) { // 요소가 존재하는지 확인
        songImageInput.addEventListener('change', function () {
            if (this.files.length > 0) {
                fileNameDisplay.textContent = this.files[0].name;
                fileNameDisplay.style.color = '#333';
            } else {
                fileNameDisplay.textContent = '선택된 파일 없음';
                fileNameDisplay.style.color = '#888';
            }
        });
    }
});

// 햄버거 메뉴 토글 함수
function toggleMenu() {
    const navLinksWrapper = document.querySelector('.nav-links-wrapper');
    navLinksWrapper.classList.toggle('active');
}