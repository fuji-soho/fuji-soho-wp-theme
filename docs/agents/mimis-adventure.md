# ミミの冒険 固定ページ制作ルール

## アプリ情報

- 日本語名：ミミの冒険 ～ミミと七色の鍵～
- 英語名：Mimi’s Adventure — Mimi and the Seven Colored Keys —
- URLスラッグ：`mimis-adventure`

## URL構成

### 日本語

- `/mimis-adventure/`
- `/mimis-adventure/privacy-policy/`
- `/mimis-adventure/terms/`
- `/mimis-adventure/support/`
- `/mimis-adventure/licenses/`

### 英語

- `/mimis-adventure/en/`
- `/mimis-adventure/en/privacy-policy/`
- `/mimis-adventure/en/terms/`
- `/mimis-adventure/en/support/`
- `/mimis-adventure/en/licenses/`

## デザイン

明るく親しみやすい、かわいいファンタジー調にします。

- 背景：`#FFF8ED`
- 本文カード：`#FFFFFF`
- メインカラー：`#9D3B3B`
- 見出し：`#51352D`
- アクセント：`#D5A33F`
- 本文：`#333333`
- 枠線：`#E8D3C5`

## フォント

- 日本語・英語：`M PLUS Rounded 1c`
- 見出し：Medium
- 長い本文：Regular

## キャラクター画像

ミミの画像はゲームトップでは比較的大きく使用できます。

プライバシーポリシー、利用規約、ライセンスでは、
ページ上部のワンポイントとして控えめに使用してください。

本文背景全面には使用しないでください。

## 実装上の分離

- ルートクラス：`.app-page--mimis-adventure`
- 専用画像：既存構成を確認してミミ専用ディレクトリに保存
- 専用CSSはミミのページだけで読み込む
- ミミ固有の色、画像、文章を他のアプリへ流用しない
