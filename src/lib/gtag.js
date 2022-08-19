export const GA_MEASUREMENT_ID = process.env.NEXT_PUBLIC_GA_ID

// ページ遷移に応じて Google アナリティクスにデータを送るための準備
export const pageview = (url) => {
  window.gtag('config', GA_MEASUREMENT_ID, {
    page_path: url,
  })
}
