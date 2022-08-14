import styles from '@/styles/two-column.module.scss'

export const TwoColumn = ({ children }) => {
  return <div className={styles['flex-container']}>{children}</div>
}

export const TwoColumnMain = ({ children }) => {
  return <div className={styles.main}>{children}</div>
}

export const TwoColumnSidebar = ({ children }) => {
  return <div className={styles.sidebar}>{children}</div>
}
