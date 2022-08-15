import Container from '@/components/container'
import Logo from '@/components/logo'
import Nav from '@/components/nav'
import styles from '@/styles/header.module.scss'

export default function Header() {
  return (
    <>
      <header>
        <Container large>
          <div className={styles['flex-container']}>
            <Logo boxOn />
            <Nav />
          </div>
        </Container>
      </header>
      <hr />
    </>
  )
}
