import * as React from 'react';
import { styled } from '@mui/material/styles';
import Box from '@mui/material/Box';
import Paper from '@mui/material/Paper';
import Grid from '@mui/material/Unstable_Grid2';
import PropTypes from 'prop-types';
import Tabs from '@mui/material/Tabs';
import Tab from '@mui/material/Tab';
import Stack from '@mui/material/Stack';
import Button from '@mui/material/Button';
import { createTheme, ThemeProvider } from '@mui/material/styles';

const Item = styled(Paper)(({ theme }) => ({
    ...theme.typography.body2,
    padding: theme.spacing(1),
    textAlign: 'center',
    color: theme.palette.primary.main,
    height: '100%',
    display: 'flex',
    alignItems: 'center',
    justifyContent: 'center',
    backgroundColor: 'transparent',
    boxShadow: 'none',
    margin: 0,
}));

const theme = createTheme({
    palette: {
        primary: {
            main: '#E88D67',
            contrastText: '#E88D67',
        },
    },
    typography: {
        tab: {
            color: '#E88D67',
        },
    },
});

function samePageLinkNavigation(event) {
    if (
        event.defaultPrevented ||
        event.button !== 0 ||
        event.metaKey ||
        event.ctrlKey ||
        event.altKey ||
        event.shiftKey
    ) {
        return false;
    }
    return true;
}

function LinkTab(props) {
    return (
        <Tab
            component="a"
            onClick={(event) => {
                if (samePageLinkNavigation(event)) {
                    event.preventDefault();
                }
            }}
            aria-current={props.selected && '/'}
            {...props}
        />
    );
}

LinkTab.propTypes = {
    selected: PropTypes.bool,
};

export default function Welcome() {
    const [value, setValue] = React.useState(0);

    const handleChange = (event, newValue) => {
        if (
            event.type !== 'click' ||
            (event.type === 'click' && samePageLinkNavigation(event))
        ) {
            setValue(newValue);
        }
    };

    return (
        <ThemeProvider theme={theme}>
            <Box sx={{ flexGrow: 1, backgroundColor: '#005C78', padding: '16px' }}>
                <Grid container spacing={3}>
                    <Grid xs marginLeft={3}>
                        <Item>
                            <img src="/images/Logo.png" alt="Logo" style={{ maxHeight: '100px', maxWidth: '100px' }} />
                        </Item>
                    </Grid>
                    <Grid xs={6}>
                        <Item>
                            <Box sx={{ width: '100%' }}>
                                <Tabs
                                    value={value}
                                    onChange={handleChange}
                                    aria-label="nav tabs example"
                                    role="navigation"
                                    textColor="inherit"
                                    TabIndicatorProps={{
                                        style: {
                                            backgroundColor: '#E88D67',
                                        },
                                    }}
                                >
                                    <LinkTab label="Dashboard" href={route('login')} />
                                    <LinkTab label="Request" href={route('request')} />
                                    <LinkTab label="Contact" href={route('contact')} />
                                </Tabs>
                            </Box>
                        </Item>
                    </Grid>
                    <Grid xs marginRight={3}>
                        <Item>
                            <Stack spacing={2} direction="row">
                                <Button
                                    variant="contained"
                                    href={route('login')}
                                    sx={{ color: '#F3F7EC' }}
                                >
                                    Sign In
                                </Button>
                                <Button
                                    variant="outlined"
                                    href={route('register')}
                                    sx={{ color: '#F3F7EC' }}
                                >
                                    Sign Up
                                </Button>
                            </Stack>
                        </Item>
                    </Grid>
                </Grid>
            </Box>
        </ThemeProvider>
    );
}
