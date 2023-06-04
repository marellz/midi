import type { UseFetchOptions } from "nuxt/app";
import { defu } from "defu";

export async function useCustomFetch<T>(
  url: string,
  options: UseFetchOptions<T> = {}
) {
  const userAuth = useCookie("token");
  const config = useRuntimeConfig();

  const defaults: UseFetchOptions<T> = {
    baseURL: "http://localhost:8000/api", // config.API_URL,
    // cache request
    key: url,

    // set user token if connected
    headers: userAuth.value
      ? { Authorization: `Bearer ${userAuth.value}` }
      : {},

    onResponse(_ctx) {
      // _ctx.response._data = new myBusinessResponse(_ctx.response._data)
    },

    onResponseError(_ctx) {
      // throw new myBusinessError()
    },
  };

  // for nice deep defaults, please use unjs/defu
  const params = defu(options, defaults);

  // const { data } = useFetch(url, params);
  // return data
  return await useFetch(url, params);
}
