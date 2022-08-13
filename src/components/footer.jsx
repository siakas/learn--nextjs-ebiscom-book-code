import Container from '@/components/container'
import Logo from '@/components/logo'
import styles from '@/styles/footer.module.scss'

export default function Footer() {
  return (
    <>
      <hr />
      <footer className={styles.wrapper}>
        <Container>
          <div className={styles['flex-container']}>
            <Logo />
            [ソーシャル]
          </div>
        </Container>
      </footer>
    </>
  )
}
