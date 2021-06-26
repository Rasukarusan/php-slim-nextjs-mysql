import React from 'react'
import Head from 'next/head'
import { Layout } from '@/components/layout'
import {
  Button,
  TableContainer,
  Table,
  TableHead,
  TableRow,
  TableBody,
  TableCell,
  Paper,
  CircularProgress,
} from '@material-ui/core'
import { makeStyles } from '@material-ui/core/styles'

const useStyles = makeStyles({
  container: {
    minHeight: '100vh',
    padding: '0 0.5rem',
    display: 'flex',
    flexDirection: 'column',
    justifyContent: 'center',
    alignItems: 'center',
  },
  main: {
    padding: '5rem 0',
    flex: 1,
    display: 'flex',
    flexDirection: 'column',
    justifyContent: 'center',
    alignItems: 'center',
  },
  title: {
    margin: 0,
    lineHeight: 1.15,
    fontSize: '4rem',
  },
  button: {
    margin: 20,
  },
})

interface Log {
  id: number
  level: string
  value: string
  createdAt: string
}

interface LogTableProps {
  logs: Log[]
}
const LogTable: React.FC<LogTableProps> = ({ logs }) => {
  return (
    <TableContainer component={Paper}>
      <Table>
        <TableHead>
          <TableRow>
            <TableCell align="left">ID</TableCell>
            <TableCell align="left">LEVEL</TableCell>
            <TableCell align="left">VALUE</TableCell>
            <TableCell align="left">CREATED_AT</TableCell>
          </TableRow>
        </TableHead>
        <TableBody>
          {logs.map((log) => (
            <TableRow key={log.id}>
              <TableCell align="left">{log.id}</TableCell>
              <TableCell align="left">{log.level}</TableCell>
              <TableCell align="left">{log.value}</TableCell>
              <TableCell align="left">{log.createdAt}</TableCell>
            </TableRow>
          ))}
        </TableBody>
      </Table>
    </TableContainer>
  )
}
const IndexPage = () => {
  const classes = useStyles()
  const [logs, setLogs] = React.useState<Log[]>([])
  const [loading, setLoading] = React.useState(false)

  const handleOnClick = async () => {
    console.log('click!!')
    setLoading(true)
    const { protocol, hostname } = document.location
    fetch(`${protocol}//${hostname}:8080`, { method: 'GET' })
      .then((res) => res.json())
      .then((json) => {
        console.log(json)
        setLogs(json)
        setLoading(false)
      })
      .catch((e) => {
        console.log(e)
        setLoading(false)
      })
  }
  return (
    <Layout>
      <div className={classes.container}>
        <Head>
          <title>Next.js & Slim PHP</title>
          <link rel="icon" href="/favicon.png" />
        </Head>

        <div className={classes.main}>
          <h1 className={classes.title}>Next.js & Slim PHP</h1>
          <Button
            className={classes.button}
            variant="contained"
            color="primary"
            onClick={handleOnClick}
          >
            取得
          </Button>
          <div hidden={!loading}>
            <CircularProgress />
          </div>
          <LogTable logs={logs} />
        </div>
      </div>
    </Layout>
  )
}
export default IndexPage
