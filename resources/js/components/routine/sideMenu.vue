<template>
  <div class="sidebar">
    <div class="sidebar-wrapper">
      <div class="sidebar-link-area">
        <!-- サイドバーメニュー -->
        <a href="https://app.ta-chal.com/routine" class="sidebar-link">
          <p>日課</p>
        </a>
        <a href="https://app.ta-chal.com/task" class="sidebar-link">
          <p>タスク</p>
        </a>
        <a href="https://app.ta-chal.com/english_practice" class="sidebar-link">
          <p>英語</p>
        </a>

        <p class="sidebar-link"></p>
      </div>
    </div>
  </div>
</template>

<style>
.sidebar {
  background-color: #3490dc;
  height: 100%; /* サイドバーの高さ */
  width: 200px; /* サイドバーのwidthを指定 */
  max-width: 200px; /* widthの最大値 */
  opacity: 0.5; /* 透過する 0に近くほど透過する */
  position: fixed; /* 左上に要素を固定する(スクロールしても位置は固定される) */
  overflow-x: hidden; /* 横軸ではみ出た要素を非表示にする */
  box-sizing: border-box; /* paddingとborderを、widthとheightに含める */
  padding-left: 40px; /* サイドバー内のリンクの位置を右にずらす */
}

.sidebar-link-area {
  padding-top: 20px; /* サイドバーリンクの上部に空白を作る */
}

.sidebar-link {
  color: black; /* リンクの文字色を白に */
}

.sidebar-link:hover {
  color: #ffffff /* マウスがリンクに乗った時も文字色を白に */
}
</style>