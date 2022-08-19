import styles from '@/styles/hero.module.scss'
import Image from 'next/image'
// import cube from '@/assets/img/cube.jpg'

const cube = {
  src: 'https://images.microcms-assets.io/assets/9431d86cef0d4081a4298f8ef072644b/6f942b7e4cd3419085611e11acfd409b/cube.jpg',
  height: 1300,
  width: 1500,
  blurDataURL:
    'data:image/jpeg;base64,/9j/2wBDAAYEBQYFBAYGBQYHBwYIChAKCgkJChQODwwQFxQYGBcUFhYaHSUfGhsjHBYWICwgIyYnKSopGR8tMC0oMCUoKSj/2wBDAQcHBwoIChMKChMoGhYaKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCj/wAARCAADAAQDASIAAhEBAxEB/8QAFQABAQAAAAAAAAAAAAAAAAAAAAf/xAAfEAABAwUAAwAAAAAAAAAAAAABAAIDBAUGESESImH/xAAUAQEAAAAAAAAAAAAAAAAAAAAD/8QAFxEBAQEBAAAAAAAAAAAAAAAAAQARIf/aAAwDAQACEQMRAD8AsGAWqkfLlJeJn6vlUB5TyO0PXg27g+IiJVdjDl//2Q==',
}

export default function Hero({ title, subtitle, imageOn = false }) {
  return (
    <div className={styles['flex-container']}>
      <div className={styles.text}>
        <h1 className={styles.title}>{title}</h1>
        <p className={styles.subtitle}>{subtitle}</p>
      </div>
      {imageOn && (
        <figure className={styles.image}>
          <Image
            src={cube}
            alt=""
            layout="responsive"
            sizes="(min-width: 1152px) 576px, (min-width: 768px) 50vw, 100vw"
            priority
            placeholder="blur"
          />
        </figure>
      )}
    </div>
  )
}
