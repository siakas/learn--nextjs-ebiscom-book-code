import Container from '@/components/container'
import Logo from '@/components/logo'
import Social from '@/components/social'
import styles from '@/styles/footer.module.scss'

export default function Footer() {
  return (
    <>
      <hr />
      <footer className={styles.wrapper}>
        <Container>
          <div className={styles['flex-container']}>
            <Logo />
            <Social />
          </div>
        </Container>
      </footer>
    </>
  )
}
