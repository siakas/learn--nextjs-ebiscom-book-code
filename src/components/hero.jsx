import styles from '@/styles/hero.module.scss'

export default function Hero({ title, subtitle, imageOn = false }) {
  return (
    <div className={styles['flex-container']}>
      <div className={styles.text}>
        <h1 className={styles.title}>{title}</h1>
        <p className={styles.subtitle}>{subtitle}</p>
      </div>
      {imageOn && <figure>[画像]</figure>}
    </div>
  )
}
